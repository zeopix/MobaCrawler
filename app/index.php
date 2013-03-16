<?php
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/util.php';

use Goutte\Client;
use Documents\Link;
use Documents\Hero;
use Documents\Build;
use Symfony\Component\DomCrawler\Crawler;

$baseUrl = "http://www.mobafire.com";
$client = new Client();



//Primera Oleada
$_log = Array();
$level = $_GET['level'];
switch($level){
	//paso 2, hacemos las builds, e indexamos todo
	case '2':
		$target = 2;
		$row = $entityManager->getRepository('Documents\Link')->findOneBy(array('status' => 1,'level'=>1));
		if(!$row){
			die("hi world");
			//$target = 3;
			break;
		}
		$crawler = $client->request('GET', $baseUrl.$row->href);
		
		$crawler->filter(".build-box")->each(function($node,$i) use ($row,$entityManager) {
			$cnode = new Crawler($node);

			//Copy Hero
			//Array of hero [0] => name [1] => MOBALink
			$arrayHero = $cnode->filter('.build-name h2 a')->extract(array('_text', 'href'));
			
			$hero = $entityManager->getRepository('Documents\Hero')->findOneBy(array('link' => $arrayHero[0][1]));
			if(!$hero){
				$hero = new Hero();
				$hero->setLink($arrayHero[0][1]);
				$hero->setName($arrayHero[0][0]);
				$entityManager->persist($hero);
				$entityManager->flush();
			}


			$rtitle = $cnode->filter('.author-info h1')->extract(array("_text"));
			$title = $rtitle[0][0];

			$runes = $cnode->filter('.rune-wrap > a')->each(function($runes_node){
				$runes_cnode = new Crawler($runes_node);
				$type = $runes_cnode->extract(array('href'));
				$number = $runes_cnode->filter('.rune-num')->extract(array('_text'));
				return Array(
					'link' => $type[0],
					'qty' => $number[0]
					);
			});

			$spells = $cnode->filter('.build-spells a')->each(function($spells_node){
				$spells_cnode = new Crawler($spells_node);
				$href = $spells_cnode->extract(array('href'));
				return $href[0];
			});
			$bags = $cnode->filter('.item-wrap')->each(function($bags_node){
				$bags_cnode = new Crawler($bags_node);
				$name = $bags_cnode->filter('h2')->text();
				$items = $bags_cnode->filter('.main-items')->each(function($node){
					$cnode = new Crawler($node);
					$link = $cnode->filter("a")->extract(array('href'));

					return $link[0];
				});

				return Array(
					'name' => $name,
					'items' => $items
				);
			});


			$abilities = $cnode->filter('.ability-wrap .ability-row')->each(function($node){
				$cnode = new Crawler($node);
				$link = $cnode->filter("a")->extract(array("href"));
				$levels = $cnode->filter('.ability-check.selected')->each(function($node,$i){
					return $node->nodeValue;
				});
				return Array(
					'link' => $link[0],
					'levels' => $levels
				);
			});



			$mastery = $cnode->filter('.mastery-box a .mastery-skill > div')->each(function($node){
				$cnode = new Crawler($node->parentNode->parentNode);

				$levels = $cnode->filter("div span")->eq(0)->text();
				$link = $cnode->extract(array('href'));

				return Array(
					'link' => $link[0],
					'levels' => $levels
				);
			});



			$stats = $cnode->filter('.build-stats table')->each(function($node){
				$cnode = new Crawler($node);
				$key = $cnode->filter("td")->eq(0)->text();
				$value = $cnode->filter("td")->eq(1)->text();
				return Array(
					'key' => $key,
					'value' => $value
				);
			});


			$build = new Build();

			$build->setHero($hero);
			$build->setTitle($title);
			$build->setMastery($mastery);
			$build->setAbilities($abilities);
			$build->setBags($bags);
			$build->setStats($stats);
			$build->setSpells($spells);
			$build->setLink($row->path);
			$build->setRunes($runes);
			$build->setCrawledAt(new \DateTime());

			$entityManager->persist($build);


		});

			$row->setStatus(2);
			$entityManager->persist($row);
			$entityManager->flush();

		

		break;
		//paso 1, analizamos la navegación
	default:
		$target = 2;
		$page = !isset($_GET['page']) ? 1 : $_GET['page'];	

		$crawler = $client->request('GET', $baseUrl.'/league-of-legends/browse?page='.$page);
		$links = $crawler->filter("#browse-build table tr.complete-build a.build-title")->extract(array('_text', 'href'));
		foreach($links as $item){
			$_log[] = "-- " . $item[0] . ": ".$item[1];
			$link = new Link($item[0],$item[1]);
			$entityManager->persist($link);
		}

		$entityManager->flush();
		if($page<105){
			$page = $page+1;
			$target = 1;
		}

		break;
}


?>
<html>
<head>
<script language="JavaScript">
window.location = '?level=<?php echo $target; ?>&page=<?php echo $page; ?>'
</script>
</head>
<body>
</body>
</html>