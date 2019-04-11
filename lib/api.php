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

header("Content-type: application/json; charset=utf-8");
$var += print_r('{
	"software":"Qwertycoin Voting System",
	"version":"1.16",
	"contact":"exchange@qwertycoin.org",
	"website":"https://voting.qwertycoin.org",
	"totalDonations":"'.round($totalBalances).'",
	"categories":[
		{"categoryID":"1","category":"General elections"},
		{"categoryID":"2","category":"Exchange elections"},
		{"categoryID":"3","category":"Donation projects"}
	],');

	$arrAnswers[] = [];
	$arrAddress[] = [];
    $i=0;
    $j=0;
$var += print_r('"elections":[');
while($i < count($questions)) {
$var += print_r('{
	"questionID":"'.$questions[$i]->getElectionID().'",
	"category":"'.$questions[$i]->getCategory().'",
	"question":"'.$questions[$i]->getQuestion().'",
	"description":"'.$questions[$i]->getDescription().'",
	"qwcPerVote":"'.$questions[$i]->getQWCPerVote().'",
	"minimumVotes":"'.$questions[$i]->getMinimumVotes().'",
	"dynamicMinVotes":"'.round((($btcPrice*$questions[$i]->getNeededBTC())/$qwcPrice)/$questions[$i]->getQWCPerVote()).'",
	"neededBTC":"'.$questions[$i]->getNeededBTC().'",
	"answers": [');

$k=0;
foreach($questions[$i]->getAnswers() as $answers) {

	if($answers->getFinalBalance() != null) {
		$tesb = $answers->getFinalBalance();
	} else {
		$tesb = $qwclib->getBalanceFromAddressToCoins($answers->qwcaddress);
	}

	$var += print_r('{
		"answer":"'.$arrAnswers[$j] = $answers->answer.'",
		"address":"'.$arrAddress[$j] = $answers->qwcaddress.'",
		"balance":"'.floor($tesb).'",
		"votes":"'.floor($tesb/$questions[$i]->getQWCPerVote()).'"
	}');
	$j++;
	$k++;
	if($k != count($questions[$i]->getAnswers())) $var += print_r(',');
}
$k=0;

$var += print_r('],
	"active": '.$questions[$i]->getStatus().'
}');
	if($i != count($questions)-1) $var += print_r(',');
	$i++;
}
$var += print_r('],"devdonations":[{"symbol":"BTC","name":"Bitcoin","address":"1DkocMNiqFkbjhCmG4sg9zYQbi4YuguFWw"},{"symbol":"QWC","name":"Qwertycoin","address":"QWC1K6XEhCC1WsZzT9RRVpc1MLXXdHVKt2BUGSrsmkkXAvqh52sVnNc1pYmoF2TEXsAvZnyPaZu8MW3S8EWHNfAh7X2xa63P7Y"},{"symbol":"ETH","name":"Ethereum","address":"0xA660Fb28C06542258bd740973c17F2632dff2517"},{"symbol":"ERC20","name":"ERC20 Tokens","address":"0x0703DB2425157F5ab3AD552CB703B6bFf72be834"},{"symbol":"BCH","name":"Bitcoin Cash","address":"qz975ndvcechzywtz59xpkt2hhdzkzt3vvt8762yk9"},{"symbol":"XMR","name":"Monero Cash","address":"47gmN4GMQ17Veur5YEpru7eCQc5A65DaWUThZa9z9bP6jNMYXPKAyjDcAW4RzNYbRChEwnKu1H3qt9FPW9CnpwZgNscKawX"},{"symbol":"ETN","name":"Electroneum","address":"etnkJXJFqiH9FCt6Gq2HWHPeY92YFsmvKX7qaysvnV11M796Xmovo2nSu6EUCMnniqRqAhKX9AQp31GbG3M2DiVM3qRDSQ5Vwq"}]}');

echo json_encode($var);

exit;
