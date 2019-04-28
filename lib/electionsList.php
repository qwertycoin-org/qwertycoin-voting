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

// Current Votings
$frage1 = new election(1,1,false,
	"Shall we switch back to Cryptonight-Classic?","Community wanted an anti ASIC Mining algorithm on height 110,520. Now, three months later Community want the old Cryptonight-Classic algorithm back.<br/>These poll will change Qwertycoin Mining in the future. After completion of the vote, we will carry out the change asap through an upcoming hard fork. Vote for Yes if you want an ASIC friendly Qwertycoin in the near future. To counter the yes votes, vote no.",
	10000,100000,1,"2018-10-31",array(
new answer("Yes",
	"QWC1bAvVctK2eFZVmgTJJAStxQP7nTStGDTusYfWRMbbTMjkwA8qUvHbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXc4iQDm"),
new answer("No",
	"QWC1fv9UmA52GW4jn265e1LAvqksPcqKcjLLXFh5o4jSRoz4HcFhHWVbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXfWAuEs")),false
,"26f02bb0fd8ddad2b83e2c60eefcb5a6d3e5de5190bbae99cbff52e12e91ee93");

$frage2 = new election(2,1,false,
	"Do we need a voting platform?","",
	12000,110,0,"2018-10-31",array(
new answer("Yes",
	"QWC1JJHyn2FhuUZYV1JFCiLjaNzFhiqwkSCnXdw16PNj6Adn9QjiES9bs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXbBuJNi",
	"2105253"),
new answer("No",
	"QWC1ZPxqvDjXQzJfCREhzq9rRL6mMxWGeYeF4dV7hGNBNSj7uPF1tWHbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXbaczx7")),false
,"2f1cb357336a7fa217e45777c82bec67dba8bb973cb1e53b622b35b17859aa7a");

$frage3 = new election(3,2,false,
	"Should QWC be listed on Yobit?","A successful vote does not mean that Qwertycoin will be listed on Yobit. For this listing we need funds<br/>between 0.1 and 2 BTC these funds must be provided by the community through further donations. But we will get in contact with this Exchange as soon as possible.",
	5000,10000,2.0,"2018-10-31",array(
new answer("Yes",
	"QWC1Fn8BNzRgiHrWxPteECSMiKDCgwDAiNS4mtd4CvqYFq9xTVvFqfKbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXctgtnC"),
new answer("No",
	"QWC1GRqjHE6gbefQoMrmdeQiqEEay5Pg28ru5C1rDwJ8TCs8ZjcjL29bs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXcwMx8y")),true
,"9957841b49c023ac75660bbd4225f04c84b3356a642c9e83dc563f803cffb683");

$frage4 = new election(4,2,false,
	"Should QWC be listed on TradeOgre?","A successful vote does not mean that Qwertycoin will be listed on TradeOgre. For this listing we need funds<br/>between 0.1 and 2 BTC these funds must be provided by the community through further donations. But we will get in contact with this Exchange as soon as possible.",
	5000,10000,0,"2018-10-31",array(
new answer("Yes",
	"QWC1aYvqphF24StMwmCEvLHeGGdSjYNmvhv3XnXp4zfg3iwF5D3oazHbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXgtXb81"),
new answer("No",
	"QWC1Y3yDxJ17czP1h5TEnv2e8DUW4B3ETgLs5f1vp1UMczFqghtA9JVbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXdJPpfK")),false
,"a8e283e0cf790d4472a78903580168c7b22373e83c239fab91d719fa647083c2");

$frage5 = new election(5,1,false,
	"Integrate an improved mining function into the GUI?","",
	100000,10000,0.2,"2018-10-31",
	array(
	new answer(
		"Yes",
		"QWC1WEquw7cAQD1fTYmhSKG6uPXJyntH9jSdS1kq4Dami93xGAmWNBFbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXcRWzkR"),
	new answer(
		"No",
		"QWC1euDAjic618ZhJLdKqBBi8nL8ZkrkDHMZ6duQcZS3Vgaox7wJvihbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXeJFGUh"),
	new answer(
		"Create lightwallet!",
		"QWC1T7fbpHCAqk7ZUpJVx7MUtZXw3E1MMVz24N7a4vBEdTDPeLVuTWubs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXeqj1Y9")),
	false
	,"93253e642a16788e539777de4bec7bae7c146cfe2b2b903c465b36aa8694f358");

$frage6 = new election(6,2,true,
	"Should QWC be listed on CryTrEx.com?","A successful vote does not mean that Qwertycoin will be listed on CryTrEx.com. For this listing we need QWC equivalent<br/>to 150,000 CRYT these funds must be provided by the community through further donations. But we will get in contact with this Exchange as soon as possible.",
	10000,14000,0.7,"2018-10-31",
	array(
	new answer(
		"Yes",
		"QWC1QK6ZAsRULDYT4ZmSEB6TwkExcxm8sTjyCE9n2Y7W6ZoLbiP4bAdbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXfpvLNa"),
	new answer(
		"No",
		"QWC1Eeo5mywDTyoMqgiqpiEc5yKduf784QGTDJV45q2vBiQDLEq2xxubs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXd3MBAp")),
	true
	,"c57c4ff3d2fe649bcd9fcb017c3b524aede8ae6b89a6c3acd12db7000000c299");

$frage7 = new election(7,2,true,
	"List QWC on STEX.com Exchange?","A successful vote does not mean that Qwertycoin will be listed automatically on STEX.com. For this listing we need QWC equivalent<br/>to 0.5 BTC these funds must be provided by the community through further donations if the collected funds are not enough. But we will get in contact with this Exchange as soon as possible."
	,10000,250000,0.5,"2018-10-31",
	array(
	new answer(
		"Yes",
		"QWC1Lrvysrq1Yrfcy3xPKCRENJ9HDfUFZ9biyGkEDE3DUbWRbm7TwBbbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXexn2cG"),
	new answer(
		"No",
		"QWC1SFdVsV6hpiEYmiqf6Lc5gTWWbLbbmRdYTAKWFiHFLUTTqCDN9iVbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXgTBXt1")),
	true
	,"1e8911e4d3c953fc60b683e7b1559b9ab938d8586eeb5fbf2c4d9e8fc6d82e25");

$frage8 = new election(8,3,true,
	"Donate for the mobile application!","This Election is for fasten up the process while our external dev is creating our Qwertycoin mobile Wallet App for Android and Apple iOS.<br/>Every donated Coin will transfered to this app development fund. You can donate as many times as you want. The more tips the developer receives,<br/>the more motivated he is to implement this honorable task."
	,1000,10000,1,"2018-10-31",
	array(
	new answer(
		"Like",
		"QWC1gSHC8cziLJLSDTh9zddhNtaPeNM6DUZmA7T91L317BaxXqjqUxDbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXdUqYfs"),
new answer(
		"Like",
		"QWC1gSHC8cziLJLSDTh9zddhNtaPeNM6DUZmA7T91L317BaxXqjqUxDbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXdUqYfs")),
	false
	,"24e22c426a21f2a9b25ef8dac77d9724f9718c0b933eb169902932abb2db6120");

$frage9 = new election(9,1,false,
	"Start an Exchange? - Qwexchange","Do we need an own Exchange? Called Qwexchange.",
	100000,250000,5,"2018-10-31",array(
new answer("Yes",
	"QWC1P6GyM58QsPdjbcW3ZMAiwvhJaDJtedFT5jZEM9FZBBKfMrZRiQMbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXbrz4Ao"),
new answer("No",
	"QWC1HgmKRQwNMZ198EeWNeLDiKHfUc9UeM2L96XZ6aFwirhZLjR4TyXbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXfaQ7fc"))
	,true
	,"633cc096745a0250f279092b48946c460c66e98e0320300da59a814d75a426ea");

$frage10 = new election(10,3,true,
	"Should we develop a faucet?","Do we need a Faucet? If yes, we have to pay external developers from upwork to solve this quest.",
	10000,250000,0.25,"2018-10-31",
	array(new answer("Yes",
	"QWC1dboD83uXF25GMHtNVjFnsNub6HmeQQqe8E7nMdyTCgCitj9RNyBbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXh7xCQ2"),
	new answer("No",
	"QWC1YMKK4rP26pVsXw4qzd5akFjnHQqjRZuinGtrwH9KK8qCRrmSdCRbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXegiAfN")),
	true
	,"69d50a83a05b6e23e2488d6c514b14ba228fd8db2ac584637f391f1803aef628");

// add votings to website
$questions = array($frage1,$frage2,$frage3,$frage4,$frage5,$frage6,$frage7,$frage8,$frage9,$frage10);
