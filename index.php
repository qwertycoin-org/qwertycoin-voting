<?php
// Copyright (c) 2018-2019, The Qwertycoin developers
//
// This file is part of Qwertycoin.
//
// Qwertycoin is free software: you can redistribute it and/or modify
// it under the terms of the GNU Lesser General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Qwertycoin is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Lesser General Public License for more details.
//
// You should have received a copy of the GNU Lesser General Public License
// along with Qwertycoin.  If not, see <http://www.gnu.org/licenses/>.

require_once('lib/_settings.php');
require_once('lib/library.php');
require_once('lib/elections.php');

// RPC -> Qwertycoin walletd
$qwclib = new Qwertycoin_Library("127.0.0.1","8070","your_password");

// Elections
$question1 = new election(
	1,	// Election ID (Consecutive number)
	1,	// Category ID
	false,	// RealTime Calculation by price (true|false)
	"Test Election 1",
	"A great description goes here.....",
	10000,	// Minimum Votes for win
	100000,	// How many QWC equals one Vote
	1,		// Estimated BTC Amounts (only if RTC is true)
	"2020-10-31",	// Time limitation
	array(	// Array of Voting Options
	new answer(
		"Yes",
		"QWC1RALGaP5U8BLJskYR2YVSjr3DQEEuS5xghbtX2mm134YVXgS4RJHZGkeBvXf4BRFLWkv4zHGJ267S9pjwvVt63xwkdYPCwF"),
	new answer(
		"No",
		"QWC1RALGaP5U8BLJskYR2YVSjr3DQEEuS5xghbtX2mm134YVXgS4RJHZGkeBvXf4BRFLWkv4zHGJ267S9pjwvVt63xwkdYPCwF")
	),
	true,	// Is this Question active? (true|false)
	""		// Payment ID (Used for further Usecases)
);

$question2 = new election(2,2,false,"Another Test election 2???","",12000,110,0,"2018-10-31",array(new answer("Yes","QWC1RALGaP5U8BLJskYR2YVSjr3DQEEuS5xghbtX2mm134YVXgS4RJHZGkeBvXf4BRFLWkv4zHGJ267S9pjwvVt63xwkdYPCwF"),new answer("No","QWC1RALGaP5U8BLJskYR2YVSjr3DQEEuS5xghbtX2mm134YVXgS4RJHZGkeBvXf4BRFLWkv4zHGJ267S9pjwvVt63xwkdYPCwF")),false,"");
$question3 = new election(2,3,false,"Another freaking election #3???","",12000,110,0,"2018-10-31",array(new answer("Yes","QWC1RALGaP5U8BLJskYR2YVSjr3DQEEuS5xghbtX2mm134YVXgS4RJHZGkeBvXf4BRFLWkv4zHGJ267S9pjwvVt63xwkdYPCwF"),new answer("No","QWC1RALGaP5U8BLJskYR2YVSjr3DQEEuS5xghbtX2mm134YVXgS4RJHZGkeBvXf4BRFLWkv4zHGJ267S9pjwvVt63xwkdYPCwF")),true,"");
$question4 = new election(2,2,true,"Test election the 4th???","",12000,110,0,"2018-10-31",array(new answer("Yes","QWC1RALGaP5U8BLJskYR2YVSjr3DQEEuS5xghbtX2mm134YVXgS4RJHZGkeBvXf4BRFLWkv4zHGJ267S9pjwvVt63xwkdYPCwF"),new answer("No","QWC1RALGaP5U8BLJskYR2YVSjr3DQEEuS5xghbtX2mm134YVXgS4RJHZGkeBvXf4BRFLWkv4zHGJ267S9pjwvVt63xwkdYPCwF")),true,"");

// Add above Questions to the voting page
$questions = array($question1,$question2,$question3,$question4);

if($electionID >= count($questions)) {	$electionID = 0; }

/* 
	Get BTC and QWC price from Coingecko
*/
$btcPrice=$qwcPrice=1;
// BTC price
try {
	$urlBTC='https://api.coingecko.com/api/v3/coins/bitcoin';
	$json=json_decode(file_get_contents($urlBTC));
	$btcPrice = $json->market_data->current_price->usd;
} catch (Exception $e) {
	$btcPrice = 4000;
    echo 'error fetching BTC:API data',  $e->getMessage(), "\n";
}

// QWC price
try {
	$urlQWC = 'https://api.coingecko.com/api/v3/coins/qwertycoin';
	$json=json_decode(file_get_contents($urlQWC));
	$qwcPrice = $json->market_data->current_price->usd;
}  catch (Exception $e) {
	$qwcPrice = 1;
    echo 'error fetching QWC:API data',  $e->getMessage(), "\n";
}

// Get entire balance
$i = 0; $totalBalances = 0;
while($i < count($questions)) {
	$k=0;
	foreach($questions[$i]->getAnswers() as $answers) {
		if($answers->getFinalBalance() != null) {
			$totalBalances += $answers->getFinalBalance();
		} else {
			$totalBalances += $qwclib->getBalanceFromAddressToCoins($answers->qwcaddress);
		}
		$k++;
	}
	$k=0;$i++;
}

if($totalBalances <= 1024) {
	$totalBanc = "Error: Node is offline";
} else {
	$totalBanc = "Total voted: ".number_format($totalBalances)."  QWC";
}

// Print the JSON API
if($api) { require_once('lib/api.php'); } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php if($election) {?>
	<meta http-equiv="refresh" content="10">
	<?php }?>
	<!-- Basic Page Needs
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta charset="utf-8">
	<title>Voting |<?php if($election && (($electionID) <= count($questions))) echo " ".$questions[$electionID]->getQuestion()." - "; ?> Qwertycoin</title>
	<meta name="description" content="<?php if($election) echo "Vote for ".$questions[$electionID]->getQuestion()." your democratic Qwertycoin! You can change a Cryptocurrency."; else echo "This platform allows members to participate and engage in important community decisions. Holding QWC means holding rights of QWC blockchain. Please use your rights to lead the community. By using this webpage, the members acknowledge that they understand and agree with the rules, terms and conditions." ?>" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Voting |<?php if($election && (($electionID) <= count($questions))) echo " ".$questions[$electionID]->getQuestion()." - "; ?> Qwertycoin" />
	<meta property="og:description" content="<?php if($election && (($electionID) <= count($questions))) echo "Vote for ".$questions[$electionID]->getQuestion()." your democratic Qwertycoin! You can change a Cryptocurrency."; else echo "This platform allows members to participate and engage in important community decisions. Holding QWC means holding rights of QWC blockchain. Please use your rights to lead the community. By using this webpage, the members acknowledge that they understand and agree with the rules, terms and conditions." ?>" />
	<meta property="og:url" content="https://voting.qwertycoin.org" />
	<meta property="og:site_name" content="Voting |<?php if($election && (($electionID) <= count($questions))) echo " ".$questions[$electionID]->getQuestion()." - "; ?> Qwertycoin" />
	<meta property="og:image" content="https://cdn.qwertycoin.org/images/other/ogvoting.png" />
	<meta property="og:image:secure_url" content="https://cdn.qwertycoin.org/images/other/ogvoting.png" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="630" />

	<link rel="shortcut icon" type="image/x-icon" href="/icons/favicon.ico">
	<link rel="icon" type="image/x-icon" href="/icons/favicon.ico">
	<link rel="icon" type="image/gif" href="/icons/favicon.gif">
	<link rel="icon" type="image/png" href="/icons/favicon.png">
	<link rel="apple-touch-icon" href="/icons/apple-touch-icon.png">
	<link rel="apple-touch-icon" href="/icons/apple-touch-icon-57x57.png" sizes="57x57">
	<link rel="apple-touch-icon" href="/icons/apple-touch-icon-60x60.png" sizes="60x60">
	<link rel="apple-touch-icon" href="/icons/apple-touch-icon-72x72.png" sizes="72x72">
	<link rel="apple-touch-icon" href="/icons/apple-touch-icon-76x76.png" sizes="76x76">
	<link rel="apple-touch-icon" href="/icons/apple-touch-icon-114x114.png" sizes="114x114">
	<link rel="apple-touch-icon" href="/icons/apple-touch-icon-120x120.png" sizes="120x120">
	<link rel="apple-touch-icon" href="/icons/apple-touch-icon-128x128.png" sizes="128x128">
	<link rel="apple-touch-icon" href="/icons/apple-touch-icon-144x144.png" sizes="144x144">
	<link rel="apple-touch-icon" href="/icons/apple-touch-icon-152x152.png" sizes="152x152">
	<link rel="apple-touch-icon" href="/icons/apple-touch-icon-180x180.png" sizes="180x180">
	<link rel="apple-touch-icon" href="/icons/apple-touch-icon-precomposed.png">
	<link rel="icon" type="image/png" href="/icons/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="/icons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/icons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/icons/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="/icons/favicon-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/icons/favicon-196x196.png" sizes="196x196">
	<meta name="msapplication-TileImage" content="/win8-tile-144x144.png">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-navbutton-color" content="#ffffff">
	<meta name="msapplication-square70x70logo" content="/icons/win8-tile-70x70.png">
	<meta name="msapplication-square144x144logo" content="/icons/win8-tile-144x144.png">
	<meta name="msapplication-square150x150logo" content="/icons/win8-tile-150x150.png">
	<meta name="msapplication-wide310x150logo" content="/icons/win8-tile-310x150.png">
	<meta name="msapplication-square310x310logo" content="/icons/win8-tile-310x310.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#060606">
	<meta name="msapplication-TileColor" content="#060606">
	<meta name="theme-color" content="#ffffff">

	<!-- Mobile Specific Metas
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FONT
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,400,700" rel="stylesheet">
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

	<!-- Scripts
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.4.0/jquery.timeago.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">

	<!-- CSS
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/skeleton.css">

	<!-- Add. CSS
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<style>
		#statSvg{background-image:url('/images/raster.png');}
		#statSvg rect{opacity: 0.9;}
		#statSvg rect:hover{opacity: 0.6;}
		body {margin: 0;background-color: #000000 !important;}
	</style>
</head>

<body>
	<!-- Primary Page Layout
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <div class="container">
      <div class="row header">
        <div class="one-third column">
          <a href="/" class="hot_link active logo"></a>
        </div>
        <div class="two-thirds column menu">
          <div class="menu_wrapper" data-toggle="collapse" data-target=".navbar-collapse">
              <a href="/" class="hot_link option"><i class="fas fa-rocket space"></i> Elections</a>
              <a href="https://pool.qwertycoin.org" class="hot_link option"><i class="fas fa-th space"></i> Official Pool</a>
              <a href="https://nodes.qwertycoin.org" class="hot_link option"><i class="fas fa-plane space"></i> Remotenodes</a>
              <a target="_blank" href="https://explorer.qwertycoin.org/" class="option"><i class="fas fa-search space"></i> Explorer</a>
              <a target="_blank" href="https://qwertycoin.org/wallet" class="option wallet"><i class="fas fa-user-circle space"></i> <strong>Get Wallet</strong></a>
          </div>
          <br class="clear" />
        </div>
    	</div>
      <div class="m_menu">
        <div class="row">
			<a href="/" class="hot_link option"><i class="fas fa-rocket space"></i> Elections</a>
			<a href="https://pool.qwertycoin.org" class="hot_link option"><i class="fas fa-th space"></i> Official Pool</a>
			<a href="https://nodes.qwertycoin.org" class="hot_link option"><i class="fas fa-plane space"></i> Remotenodes</a>
			<a target="_blank" href="http://explorer.qwertycoin.org/" class="option"><i class="fas fa-search space"></i> Explorer</a>
			<a target="_blank" href="https://qwertycoin.org/wallet" class="option wallet"><i class="fas fa-user-circle space"></i> <strong>Get Wallet</strong></a>
        </div>
      </div>
      <div class="row psa">
        <div class="one-third column info">
			<strong>1 Million QWC = <?php echo round($qwcPrice * 1000000,4)?> USD</strong>!
        </div>
			<div class="one-third column">
				Welcome to the <strong>Official Qwertycoin Voting page!</strong>
			</div>
			<div class="one-third column info">
				<span class="miningPortDesc"><?php echo $totalBanc; ?></span>
			</div>
      </div>
		<!-- load framed content -->
		<div id="page">
    	<?php if(true) {
			if($election) {
				$qtitle = $questions[$electionID]->getQuestion();
				$qdescr = $questions[$electionID]->getDescription();
				$qanswers = count($questions[$electionID]->getAnswers());
				$qarrAnswers[] = []; $qarrAddress[] = []; $qarrVotes[] = []; $k=0;
				foreach($questions[$electionID]->getAnswers() as $answers) {
					if($answers->getFinalBalance() != null) {
						$qarrVotes[$k] = $answers->getFinalBalance();
					} else {
						$qarrVotes[$k] = $qwclib->getBalanceFromAddressToCoins($answers->qwcaddress);
					}
					$qarrAnswers[$k] = $answers->answer;
					$qarrAddress[$k] = $answers->qwcaddress;
					$k++;
				}
				$qneededBTC = $questions[$electionID]->getNeededBTC();
				$qminimumVotes = $questions[$electionID]->getMinimumVotes();
				$qqwcpervote = $questions[$electionID]->getQWCPerVote();
				$qrealtimeGoal = $questions[$electionID]->getRealtimeGoal();
				$qpaymentID = $questions[$electionID]->getPaymentID();

				$realtimeAmount = ($btcPrice*$qneededBTC)/$qwcPrice/$qqwcpervote;
			} if(!$election) { ?>

        <div class="row"><h1>Dear Qwertycoin Community Members,</h1><p>
Welcome to Official Qwertycoin Voting Platform.<br/>This platform allows members to participate and engage in important community decisions. Holding QWC means holding rights of QWC blockchain. Please use your rights to lead the community.<br/>By using this webpage, the members acknowledge that they understand and agree with the rules, terms and conditions set forth in the following passages.</p><hr/></div>
		<div class="row">

			<div class="one-half column miners">
			<h2 class="miningPortDesc">How to participate</h2>
			<ol>
			<li>Choose a topic from the list under Election or <a href="?">start a topic</a>.</li>
			<li>Send QWC to the address of supporting actions.</li>
			<li>That’s it. Simple.</li>
			</ol>
        	<hr/>
        <h4 class="miningPortDesc">General elections</h4>
        <ul>
		<?php $i=0; while($i < count($questions)) {
		if($questions[$i]->getStatus() != "false" && $questions[$i]->getCategory() == 1) {
			echo '<li><a href="/?election='.$questions[$i]->getElectionID().'" title="'.$questions[$i]->getQuestion().'">'.$questions[$i]->getQuestion().'</a></li>';	}	$i++;	} ?>
				</ul>
				<h5 class="miningPortDesc">Exchange elections</h5>
				<ul>
		<?php $i=0; while($i < count($questions)) {
		if($questions[$i]->getStatus() != "false" && $questions[$i]->getCategory() == 2) {
			echo '<li><a href="/?election='.$questions[$i]->getElectionID().'" title="'.$questions[$i]->getQuestion().'">'.$questions[$i]->getQuestion().'</a></li>';	}	$i++; } ?>
				</ul>
				<h5 class="miningPortDesc">Donation projects</h5>
				<ul>
		<?php $i=0; while($i < count($questions)) {
		if($questions[$i]->getStatus() != "false" && $questions[$i]->getCategory() == 3) {
			echo '<li><a href="/?election='.$questions[$i]->getElectionID().'" title="'.$questions[$i]->getQuestion().'">'.$questions[$i]->getQuestion().'</a></li>'; } $i++; } ?>
				</ul>
				<h5 class="miningPortDesc">Finished elections</h5>
				<ul>
		<?php $i=0; while($i < count($questions)) {
		if($questions[$i]->getStatus() != "true") {
			echo '<li><a href="/?election='.$questions[$i]->getElectionID().'" title="'.$questions[$i]->getQuestion().'"><s>'.$questions[$i]->getQuestion().'</s></a></li>'; } $i++; } ?>
				</ul>
			</div>
			<div class="one-half column">
			<h3 class="miningPortDesc">General Rules</h3>
        <ol>
			<li>A voting period may exist. Only votes casted during the period are valid. Please do not send coins after voting is finished.</li>
			<li>If any of choices under a specific topic does not reach the minimum vote requirement, the voting period will be extended until, at least, one of them passes the minimum threshold to be considered a valid community decision.</li>
			<li>Voters can make multiple(unlimited) transactions on any specific choice of a topic in separate instances. Make a difference in shaping QWC.</li>
			<li>There will be a minimum vote level for each topic. For any choices to be considered valid, they must reach the minimum level.</li>
			<li>If any of choices fails to meet the minimum level, all votes will be forfeited and sent to foundation wallet. It is important for voters to discuss with other QWC members in the various channels to avoid this kind of situation.</li>
			<li>In case that the vote result is a tie, meaning that <strong><u>converted number</u></strong> votes are equal in more than one choice, those choices will be posted again for the 2<sup>nd</sup> round.</li>
			<li class="miningPortDesc">All coins used for voting will be sent to foundation wallet address for future chain developments and improvements. All voting transactions are final.</li>
			<li>Coins donated to the foundation wallet address will be used for various purposes including infrastructure management, development, airdrop, bounties and exchange listing.</li>
			<li>The same topic cannot be posted again for the duration of 6 months from the latest voting closing date, unless the core team acknowledges that the subject requires a sense of extreme urgency and/or is necessary for technical adjustments.</li>
			<li>The core team expects to observe some centralized voting actions in the early period of this platform. However, such influence will be normalized over time.</li>
			<li><span class="miningPortDesc">What is real time calculation?</span> (Can be activated or deactivated)<br/>The real-time calculation is a method to adjust the required number of votes to the current market value. For any difference with a factor of 10, the initial target will increased or decreased by a factor of 10. Example: Initial goal: 100 Votes; Calculated goal: 1200 new target: 1,000</li>
        </ol>
			</div>
		</div>

<?php }

  if($election) { ?>
    <h1 class="miningPortDesc">Q: <?php echo $qtitle;?></h1>
    <?php if($qdescr != "") echo "<p>".$qdescr."</p>"; ?>
    <?php if($qneededBTC != "0") { ?>
    	<strong>Needed Amount: <span class="income"><?php echo $qneededBTC; ?></span> BTC</strong><br/>
    	<strong>One valid Vote equals: <span class="income"><?php echo number_format($qqwcpervote, 2, '.', ',') ?></span> QWC</strong><br/>
    	<strong>Initial minimum Votes: <span class="income"><?php echo number_format($qminimumVotes); ?></span></strong><br/>
    	<?php if($qrealtimeGoal == "1") { ?>
    	<strong class="miningPortDesc">Note: real time target is</strong> enabled<strong class="miningPortDesc"> <?php echo number_format($realtimeAmount) ?> Votes, based on the current BTC : QWC price in real time by <a href="https://www.coingecko.com/de/kurs_chart/qwertycoin/btc" target="_blank" title="Stats by CoinGecko">CoinGecko</a>.</strong><br/>
<?php
	// goal is 10000x less than real time
	if($realtimeAmount/10000 >= $qminimumVotes) {
		$qminimumVotes = $qminimumVotes * 10000;
	// goal is 1000x less than real time
	} elseif($realtimeAmount/1000 >= $qminimumVotes) {
		$qminimumVotes = $qminimumVotes * 1000;
	// goal is 100x less than real time
	} elseif($realtimeAmount/100 >= $qminimumVotes) {
		$qminimumVotes = $qminimumVotes * 100;
	// goal is 10x less than real time
	} elseif($realtimeAmount/10 >= $qminimumVotes) {
		$qminimumVotes = $qminimumVotes * 10;
	// goal is 10000x higher than real time
	} elseif ($qminimumVotes*10000 <= $realtimeAmount) {
		$qminimumVotes = $qminimumVotes / 10000;
	// goal is 1000x higher than real time
	} elseif ($qminimumVotes*1000 <= $realtimeAmount) {
		$qminimumVotes = $qminimumVotes / 1000;
	// goal is 100x higher than real time
	} elseif ($qminimumVotes*100 <= $realtimeAmount) {
		$qminimumVotes = $qminimumVotes / 100;
	// goal is 10x higher than real time
	} elseif ($qminimumVotes*10 <= $realtimeAmount) {
		$qminimumVotes = $qminimumVotes / 10;
	}
?>
		<strong>New required real time: <span class="income"><?php echo number_format($qminimumVotes); ?></span> Votes</strong><br/>
		<?php/* end realtime calculation */} else {?>
			<strong class="miningPortDesc">Note: real time target is</strong> disabled<strong class="miningPortDesc"> <?php echo number_format($realtimeAmount) ?> Votes, based on the current BTC : QWC price in real time by <a href="https://www.coingecko.com/de/kurs_chart/qwertycoin/btc" target="_blank" title="Stats by CoinGecko">CoinGecko</a>.</strong><br/>
		<?php } ?>
      <?php } ?>
      <hr/>
      <?php if($questions[$electionID]->getStatus() != "true") { ?>
      	<span class="income">Election is finished.</span><br/>You can (re)check with this PaymentID: <a target="_blank" href="https://explorer.qwertycoin.org/?hash=<?php echo strtoupper($questions[$electionID]->getPaymentID()); ?>#blockchain_payment_id"><?php echo strtoupper($questions[$electionID]->getPaymentID()); ?></a> when payments were made.
      <?php echo "<hr/>";}?>

      <?php
      $qvotingFactor = 1000/$qminimumVotes;
      $i = 0;
      $chartColorArray = array("#2A7BB4","#B4472A","#FF0000","000000");
      while($qanswers > $i) { ?>
		<p>Vote for: <strong><?php echo $qarrAnswers[$i];?></strong><br/>
		<code><?php echo $qarrAddress[$i];?></code></p>
	<?php $i++;} ?>
		<hr/>

        <h1 class="miningPortDesc">Results:</h1>
        <span><strong><?php echo number_format($qqwcpervote, 2, '.', ',');?> QWC equals one vote</strong> (<?php echo number_format($qminimumVotes);?> votes required to win)</span><br/><br/>
        <svg id="statSvg" xmlns="http://www.w3.org/2000/svg" width="1200" height="<?php echo 90*$qanswers;?>">
            <?php   $i  = 0;
                    $x1 = 80*$qanswers;
                    $y1 = 60;
                    $y2 = 35;
                    $y3 = 85;
            while($qanswers > $i) { ?>
            <text x="10" y="<?php echo $y1; ?>" font-size="16" font-family="Arial" fill="#fbd643"><?php echo $qarrAnswers[$i];?></text>
            <rect x="50" y="<?php echo $y2; ?>" width="<?php if((($qarrVotes[$i]/$qqwcpervote)*$qvotingFactor) <= 2 && ($qarrVotes[$i]*$qvotingFactor) != 0) echo "3"; else echo ($qarrVotes[$i]/$qqwcpervote)*$qvotingFactor;?>" height="40" rx="3" ry="3" fill="<?php echo $chartColorArray[$i];?>" />
            <?php
                $y1 += 60;
                $y2 += 60;
                $y3 += 15;
                $i++;
            } ?>
            <line x1="50" y1="10" x2="50" y2="<?php echo $x1; ?>" stroke-width="2" stroke="#808080" />
            <line x1="1050" y1="10" x2="1050" y2="<?php echo $x1; ?>" stroke-width="2" stroke="#808080" />
            <text x="1055" y="85" font-size="16" font-family="Arial" fill="#fbd643">minimum</text>
            <text x="1055" y="100" font-size="16" font-family="Arial" fill="#fbd643"><?php echo number_format($qminimumVotes);?></text>
            <text x="1055" y="115" font-size="16" font-family="Arial" fill="#fbd643">votes</text>
        </svg>

        <hr/>
        <h1 class="miningPortDesc">Details:</h1>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Election', 'Votes'],
          <?php $i=0;
          while($qanswers > $i) {
          print "['".$qarrAnswers[$i]."', ".round($qarrVotes[$i]/$qqwcpervote)."],";
          $i++;
          }?>

        ]);
				var options = {
					legend: 'none',
					backgroundColor: 'transparent',
					pieSliceText: 'label',
					is3D: true,
				};
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
        <?php
        $i = 0;
        $totalFunds = 0;
        while($qanswers > $i) {
            $totalFunds += $qarrVotes[$i]; ?>

		<p><h3 <?php if(($qarrVotes[$i]/$qqwcpervote) >= $qminimumVotes) echo "style=\"color:#00FA9A\""; ?>><?php echo $qarrAnswers[$i] ?>: <?php echo number_format(($qarrVotes[$i]/$qqwcpervote)); ?> Votes (<?php echo round((($qarrVotes[$i]/$qqwcpervote)/ $qminimumVotes*100),4); ?>%)</h3>
			Balance: <strong><?php echo number_format($qarrVotes[$i]); ?> QWC</strong> this corresponds to <strong><?php echo number_format(($qarrVotes[$i]/$qqwcpervote)); ?></strong> valid votes.</p>
			<hr/>
<?php $i++; } if($totalFunds > 0) { ?>
		<h1 class="miningPortDesc">Proportional representation:</h1>
        <div id="piechart" style="height: 350px; width:350px"></div>
    	<?php } ?>
        <p><h3 class="miningPortDesc">Total collected donations: <?php echo number_format($totalFunds); ?> QWC</h3></p>
	<?php
	//end if election
	}
//end start topic
}?>
      </div>
			<div class="footer">
				<div class="one-half column">
				<!-- This copyright should be left intact -->
				Powered by <a target="_blank" href="https://github.com/qwertycoin-org/qwertycoin-voting"><i class="fa fa-github"></i> Qwertycoin Voting System</a> v. 1.16<br />
				Copyright &copy; 2018 &mdash; 2019 <a href="https://qwertycoin.org/">The Qwertycoin Group</a>.<br />
				</div>
				<div class="one-half column">
					<a href="https://voting.qwertycoin.org?api"><strong>API</strong></a>
				</div>
				<br class="clear" />
			</div>
    </div>

    <!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>

</html>
