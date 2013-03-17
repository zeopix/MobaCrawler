<?php
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/util.php';

use Goutte\Client;
use Documents\Link;
use Documents\Hero;
use Documents\Build;
use Documents\Rune;
use Documents\Spell;
use Documents\Item;
use Documents\Mastery;
use Documents\Ability;
use Symfony\Component\DomCrawler\Crawler;

$baseUrl = "http://www.mobafire.com";
$client = new Client();
$showMenu = false;
$message = false;

//Primera Oleada
$_log = Array();
$level = $_GET['level'];
switch($level){


	//Hero
	case '8':
		$target = 8;
		
		//let's scan abilities
		$hero = $entityManager->getRepository('Documents\Hero')->findOneBy(array('crawled' => false));
		$crawler = $client->request('GET', $baseUrl.$hero->link);
		if(!$hero){
			$target = 0;
			$showMenu = true;
			$message = "Se acabaron los heroes.";
			break;
		}

		$title = trim($crawler->filter('.champ-info .champ-title')->text());
		$health = trim($crawler->filter('.box-blue table tr .hiliteG')->eq(0)->text());
		$critical = trim($crawler->filter('.box-blue table tr .hiliteG')->eq(1)->text());
		$mana = trim($crawler->filter('.box-blue table tr .hiliteG')->eq(2)->text());
		$health_regen = trim($crawler->filter('.box-blue table tr .hiliteG')->eq(3)->text());
		$speed = trim($crawler->filter('.box-blue table tr .hiliteG')->eq(4)->text());
		$mana_regen = trim($crawler->filter('.box-blue table tr .hiliteG')->eq(5)->text());
		$armor = trim($crawler->filter('.box-blue table tr .hiliteG')->eq(6)->text());
		$range = trim($crawler->filter('.box-blue table tr .hiliteG')->eq(7)->text());
		$resist = trim($crawler->filter('.box-blue table tr .hiliteG')->eq(8)->text());

		$image = $crawler->filter('.champ-wrap .champ-icon .thumb img')->extract(array('src'));

		$riot_points = trim($crawler->filter('.box-blue .hiliteT')->eq(0)->text());
		$influence_points = trim($crawler->filter('.box-blue .hiliteT')->eq(1)->text());
		$tags = trim($crawler->filter('h1.champ-name span')->text());

		$hero->setHealth($health);
		$hero->setCritical($critical);
		$hero->setMana($mana);
		$hero->setHealthRegen($health_regen);
		$hero->setSpeed($speed);
		$hero->setTitle($title);
		$hero->setManaRegen($mana_regen);
		$hero->setArmor($armor);
		$hero->setAttackRange($range);
		$hero->setResist($resist);
		$hero->setRiotPoints($riot_points);
		$hero->setInfluencePoints($influence_points);
		$hero->setImage($image[0]);
		$hero->setTags($tags);
		$hero->setUpdatedAt(new \DateTime());
		$hero->setCrawled(true);
		$entityManager->persist($hero);
		$entityManager->flush();

		break;
	//Spells
	case '7':
		$target = 7;
		//let's scan abilities
		$spell = $entityManager->getRepository('Documents\Spell')->findOneBy(array('crawled' => false));
		$crawler = $client->request('GET', $baseUrl.$spell->link);
		if(!$spell){
			$target = 0;
			$showMenu = true;
			$message = "Se acabaron las spells.";
			break;
		}
		die($spell->link);
		$name = $crawler->filter('.ability-info h2')->text();
		$level = $crawler->filter('.ability-info .hiliteG')->text();
		$rawDescription = $crawler->filter('.ability-info')->text();
		$start = ($level > 9) ? 2 : 1;
		$description = trim(substr(trim(str_replace("Level:","",$rawDescription)),$start));
		$image = $crawler->filter('.item-info-image')->extract(array('src'));
		$spell->setImage($image[0]);
		$spell->setUpdatedAt(new \DateTime());
		$spell->setCrawled(true);
		$spell->setDescription($description);

		$entityManager->persist($spell);
		$entityManager->flush();

		break;
	//Abilities
	case '6':
		$target = 6;
		//let's scan abilities
		$ability = $entityManager->getRepository('Documents\Ability')->findOneBy(array('crawled' => false));
		$crawler = $client->request('GET', $baseUrl.$ability->link);
		if(!$ability){
			$target = 0;
			$showMenu = true;
			$message = "Se acabaron las habilidades.";
			break;
		}
		$name = $crawler->filter('.ability-info h2')->text();
		$description = $crawler->filter('.ability-info')->text();
		$image = $crawler->filter('.item-info-image')->extract(array('src'));
		$ability->setImage($image[0]);
		$ability->setUpdatedAt(new \DateTime());
		$ability->setCrawled(true);
		$ability->setDescription($description);

		$entityManager->persist($ability);
		$entityManager->flush();

		break;
	//Mastery
	case '5':
		$target = 5;
		//let's scan runes
		$mastery = $entityManager->getRepository('Documents\Mastery')->findOneBy(array('crawled' => false));
		$crawler = $client->request('GET', $baseUrl.$mastery->link);
		if(!$mastery){
			$target = 0;
			$showMenu = true;
			$message = "Se acabaron las maestrias.";
			break;
		}
		$name = $crawler->filter('.ability-info h2.hiliteW')->text();
		$description = $crawler->filter('.ability-info > p')->text();
		$image = $crawler->filter('.item-info-image')->extract(array('src'));
		$mastery->setImage($image[0]);
		$mastery->setUpdatedAt(new \DateTime());
		$mastery->setCrawled(true);
		$mastery->setDescription($description);

		$entityManager->persist($mastery);
		$entityManager->flush();

		break;
	//Runes
	case '4':
		$target = 4;
		//let's scan runes
		$item = $entityManager->getRepository('Documents\Rune')->findOneBy(array('crawled' => false));
		if(!$item){
			$target = 0;
			$showMenu = true;
			$message = "Se acabaron las runas.";
			break;
		}

		$crawler = $client->request('GET', $baseUrl.$item->link);
		$title = trim($crawler->filter('.col-left h1')->eq(0)->text());
		if($title == "The page you are looking for is cowering in a corner somewhere"){
			$item->setUpdatedAt(new \DateTime());
			$item->setCrawled(true);
		}else{
			$name = $crawler->filter('.ability-info h2.hiliteW')->text();
			$price = $crawler->filter('.ability-info .hiliteT')->eq(0)->text();
			$rawDescription = $crawler->filter('.ability-info > p')->text();
			$rawDescription2 = str_replace("Purchase Cost:","",$rawDescription);
			$description = trim(str_replace($price,"",$rawDescription2));
			$image = $crawler->filter('.item-info-image')->extract(array('src'));
			$item->setImage($image[0]);
			$item->setUpdatedAt(new \DateTime());
			$item->setCrawled(true);
			$item->setPrice($price);
			$item->setName($name);
			$item->setDescription($description);
		}
		$entityManager->persist($item);
		$entityManager->flush();
		
		break;

	//Item
	case '3':
		$target = 3;
		//let's scan items
		$item = $entityManager->getRepository('Documents\Item')->findOneBy(array('crawled' => false));
		$crawler = $client->request('GET', $baseUrl.$item->link);
		if(!$item){
			$target = 0;
			$showMenu = true;
			$message = "Se acabaron los items.";
			break;
		}

		$name = $crawler->filter('.item-info h2')->text();
		$total_price = $crawler->filter('.item-info .hiliteT')->eq(0)->text();
		$recipe_price = $crawler->filter('.item-info .hiliteT')->eq(1)->text();
		$description = $crawler->filter('.item-info > p')->eq(2)->text();
		$image = $crawler->filter('.item-info-image')->extract(array('src'));

		$item->setImage($image[0]);
		$item->setUpdatedAt(new \DateTime());
		$item->setCrawled(true);
		$item->setTotalPrice($total_price);
		$item->setRecipePrice($recipe_price);
		$item->setDescription($description);

		$entityManager->persist($item);
		$entityManager->flush();

		break;
	//paso 2, hacemos las builds, e indexamos todo
	case '2':
		$target = 2;
		$row = $entityManager->getRepository('Documents\Link')->findOneBy(array('status' => 1,'level'=>1));
		if(!$row){
			$message = "Stage 2 Finished.";
			$showMenu = true;
			break;
		}
		$crawler = $client->request('GET', $baseUrl.$row->href);
		$title = $crawler->filter('.author-info h1')->text();
		$crawler->filter(".build-box")->each(function($node,$i) use ($row,$entityManager,$title) {
			$cnode = new Crawler($node);

			//Copy Hero
			//Array of hero [0] => name [1] => MOBALink
			$arrayHero = $cnode->filter('.build-name h2 a')->extract(array('_text', 'href'));
			
			$hero = $entityManager->getRepository('Documents\Hero')->findOneBy(array('link' => $arrayHero[0][1]));
			if(!$hero){
				$hero = new Hero();
				$hero->setLink($arrayHero[0][1]);
				$hero->setName($arrayHero[0][0]);
				$hero->setUpdatedAt(new \DateTime());
				$entityManager->persist($hero);
				$entityManager->flush();
			}
			

			$runes = $cnode->filter('.rune-wrap > a')->each(function($runes_node) use ($entityManager){
				$runes_cnode = new Crawler($runes_node);
				$type = $runes_cnode->extract(array('href'));
				$number = $runes_cnode->filter('.rune-num')->extract(array('_text'));
				//TODO: Search by link, replace for ID
				$rune = $entityManager->getRepository('Documents\Rune')->findOneBy(array('link' => $type[0]));
				if(!$rune){
					$rune = new Rune();
					$rune->setLink($type[0]);
					$rune->setUpdatedAt(new \DateTime());
					$entityManager->persist($rune);
					$entityManager->flush();	
				}
				return Array(
					'id' => $rune->getId(),
					'qty' => $number[0]
				);
			});

			$spells = $cnode->filter('.build-spells a')->each(function($spells_node) use ($entityManager){
				$spells_cnode = new Crawler($spells_node);
				$href = $spells_cnode->extract(array('href'));

				$spell = $entityManager->getRepository('Documents\Spell')->findOneBy(array('link' => $href[0]));
				if(!$spell){
					$spell = new Spell();
					$spell->setLink($href[0]);
					$spell->setUpdatedAt(new \DateTime());
					$entityManager->persist($spell);
					$entityManager->flush();	
				}

				return $spell->getId();
			});
			$bags = $cnode->filter('.item-wrap')->each(function($bags_node) use ($entityManager){
				$bags_cnode = new Crawler($bags_node);
				$name = $bags_cnode->filter('h2')->text();
				$items = $bags_cnode->filter('.main-items')->each(function($node) use ($entityManager){
					$cnode = new Crawler($node);
					$link = $cnode->filter("a")->extract(array('href'));

					$item = $entityManager->getRepository('Documents\Item')->findOneBy(array('link' => $link[0]));
					if(!$item){
						$item = new Item();
						$item->setLink($link[0]);
						$item->setUpdatedAt(new \DateTime());
						$entityManager->persist($item);
						$entityManager->flush();	
					}

					return $item->getId();
				});

				return Array(
					'name' => $name,
					'items' => $items
				);
			});


			$abilities = $cnode->filter('.ability-wrap .ability-row')->each(function($node) use ($entityManager,$hero){
				$cnode = new Crawler($node);
				$link = $cnode->filter("a")->extract(array("href"));
				$ability = $entityManager->getRepository('Documents\Ability')->findOneBy(array('link' => $link[0]));
					if(!$ability){
						$ability = new Ability();
						$ability->setHero($hero);
						$ability->setLink($link[0]);
						$ability->setUpdatedAt(new \DateTime());
						$entityManager->persist($ability);
						$entityManager->flush();	
					}

				$levels = $cnode->filter('.ability-check.selected')->each(function($node,$i) use ($entityManager){
					return $node->nodeValue;
				});
				return Array(
					'id' => $ability->getId(),
					'levels' => $levels
				);
			});



			$mastery = $cnode->filter('.mastery-box a .mastery-skill > div')->each(function($node) use ($entityManager){
				$cnode = new Crawler($node->parentNode->parentNode);

				$levels = $cnode->filter("div span")->eq(0)->text();
				$link = $cnode->extract(array('href'));

				$mastery = $entityManager->getRepository('Documents\Mastery')->findOneBy(array('link' => $link[0]));
					if(!$mastery){
						$mastery = new Mastery();
						$mastery->setLink($link[0]);
						$mastery->setUpdatedAt(new \DateTime());
						$entityManager->persist($mastery);
						$entityManager->flush();	
					}

				return Array(
					'id' => $mastery->getId(),
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
			$build->setLink($row->href);
			$build->setRunes($runes);
			$build->setCrawledAt(new \DateTime());

			$entityManager->persist($build);


		});

			$row->setStatus(2);
			$entityManager->persist($row);
			$entityManager->flush();

		

		break;
		//paso 1, analizamos la navegación
	case "1":
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
		}else{
			$showMenu = true;
			$message = "Se leyeron todas las listas";
		}

		break;

	default:
		$showMenu = true;
		break;
}

//stats
if($showMenu){

	//remaining objects
	$objects = Array('Item','Ability','Rune','Spell','Mastery','Hero');
	$stats = Array();
	foreach($objects as $object){
		$prefix = "Documents\\";
		$total = $entityManager->createQuery("SELECT COUNT(o.id) FROM ".$prefix.$object." o")->getSingleScalarResult();
		$done = $entityManager->createQuery("SELECT COUNT(o.id) FROM ".$prefix.$object." o WHERE o.crawled=:crawled")->setParameter('crawled',true)->getSingleScalarResult();
		$percent = round($done*100/$total);

		$stats[$object] = Array(
			'total' => $total,
			'done' => $done,
			'percent' => $percent
		);

	}	

	//remaining builds
	$total = $entityManager->createQuery('SELECT COUNT(l.id) FROM Documents\Link l')->getSingleScalarResult();
	$done = $entityManager->createQuery('SELECT COUNT(l.id) FROM Documents\Link l WHERE l.status=:status')->setParameter('status',2)->getSingleScalarResult();
	$percent = round($done*100/$total);

}

?>
<html>
<head>
<?php if(!$showMenu){ ?>
<script language="JavaScript">
window.location = '?level=<?php echo $target; ?>&page=<?php echo $page; ?>'
</script>
<?php } ?>
</head>
<body>

<?php if($showMenu){ ?>
<h1>MobaFire Scrapper</h1>
<?php if($message){ ?>
<h2 style="color: red;"><?php echo $message; ?></h2>
<?php } ?>
<ul>
	<li><a href="?level=1">Scan Build List</a></li>
	<li><span><?php echo $percent ?>% <small>(<?php echo $done ?>/<?php echo $total ?>)</small></span> <a href="?level=2">Scan Builds</a></li>
	<li><span><?php echo $stats['Item']['percent'] ?>% <small>(<?php echo $stats['Item']['done'] ?>/<?php echo $stats['Item']['total'] ?>)</small></span> <a href="?level=3">Scan Items</a></li>
	<li><span><?php echo $stats['Rune']['percent'] ?>% <small>(<?php echo $stats['Rune']['done'] ?>/<?php echo $stats['Rune']['total'] ?>)</small></span> <a href="?level=4">Scan Runes</a></li>
	<li><span><?php echo $stats['Mastery']['percent'] ?>% <small>(<?php echo $stats['Mastery']['done'] ?>/<?php echo $stats['Mastery']['total'] ?>)</small></span> <a href="?level=5">Scan Mastery</a></li>
	<li><span><?php echo $stats['Ability']['percent'] ?>% <small>(<?php echo $stats['Ability']['done'] ?>/<?php echo $stats['Ability']['total'] ?>)</small></span> <a href="?level=6">Scan Abilities</a></li>
	<li><span><?php echo $stats['Spell']['percent'] ?>% <small>(<?php echo $stats['Spell']['done'] ?>/<?php echo $stats['Spell']['total'] ?>)</small></span> <a href="?level=7">Scan Spells</a></li>
	<li><span><?php echo $stats['Hero']['percent'] ?>% <small>(<?php echo $stats['Hero']['done'] ?>/<?php echo $stats['Hero']['total'] ?>)</small></span> <a href="?level=8">Scan Heros</a></li>
</ul>
<?php } ?>
</body>
</html>