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
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU Lesser General Public License for more details.
//
// You should have received a copy of the GNU Lesser General Public License
// along with Qwertycoin. If not, see <http://www.gnu.org/licenses/>.

// Current Votings
$question01 = new election(
	1,
	1,
	false,
	"Shall we switch back to Cryptonight-Classic?",
	"Community wanted an anti ASIC Mining algorithm on height 110,520. Now, three months later Community want the old Cryptonight-Classic algorithm back.<br/>These poll will change Qwertycoin Mining in the future. After completion of the vote, we will carry out the change asap through an upcoming hard fork. Vote for Yes if you want an ASIC friendly Qwertycoin in the near future. To counter the yes votes, vote no.",
	10000,
	100000,
	1,
	"1540944000",
	array(
	new answer("Yes",
		"QWC1bAvVctK2eFZVmgTJJAStxQP7nTStGDTusYfWRMbbTMjkwA8qUvHbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXc4iQDm","1002817779"),
	new answer("No",
		"QWC1fv9UmA52GW4jn265e1LAvqksPcqKcjLLXFh5o4jSRoz4HcFhHWVbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXfWAuEs","18140814")
	),
	false,
	"26f02bb0fd8ddad2b83e2c60eefcb5a6d3e5de5190bbae99cbff52e12e91ee93"
);

$question02 = new election(
	2,
	1,
	false,
	"Do we need a voting platform?",
	"",
	12000,
	110,
	0,
	"1540944000",
	array(
	new answer(
		"Yes",
		"QWC1JJHyn2FhuUZYV1JFCiLjaNzFhiqwkSCnXdw16PNj6Adn9QjiES9bs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXbBuJNi",
		"2105253"),
	new answer(
		"No",
		"QWC1ZPxqvDjXQzJfCREhzq9rRL6mMxWGeYeF4dV7hGNBNSj7uPF1tWHbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXbaczx7")
	),
	false,
	"2f1cb357336a7fa217e45777c82bec67dba8bb973cb1e53b622b35b17859aa7a"
);

$question03 = new election(
	3,
	2,
	false,
	"Donate for a YoBit Listing",
	"A successful vote does not mean that Qwertycoin will be listed on Yobit. For this listing we need funds<br/>between 0.1 and 2 BTC these funds must be provided by the community through further donations. But we will get in contact with this Exchange as soon as possible.",
	5000,
	10000,
	2.0,
	"1540944000",
	array(
	new answer(
		"Yes",
		"QWC1Fn8BNzRgiHrWxPteECSMiKDCgwDAiNS4mtd4CvqYFq9xTVvFqfKbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXctgtnC"),
	new answer(
		"No",
		"QWC1GRqjHE6gbefQoMrmdeQiqEEay5Pg28ru5C1rDwJ8TCs8ZjcjL29bs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXcwMx8y")
	),
	true,
	"9957841b49c023ac75660bbd4225f04c84b3356a642c9e83dc563f803cffb683"
);

$question04 = new election(
	4,
	2,
	false,
	"Should QWC be listed on TradeOgre?",
	"A successful vote does not mean that Qwertycoin will be listed on TradeOgre. For this listing we need funds<br/>between 0.1 and 2 BTC these funds must be provided by the community through further donations. But we will get in contact with this Exchange as soon as possible.",
	5000,
	10000,
	0,
	"1540944000",
	array(
	new answer(
		"Yes",
		"QWC1aYvqphF24StMwmCEvLHeGGdSjYNmvhv3XnXp4zfg3iwF5D3oazHbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXgtXb81",
		"50001668"),
	new answer(
		"No",
		"QWC1Y3yDxJ17czP1h5TEnv2e8DUW4B3ETgLs5f1vp1UMczFqghtA9JVbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXdJPpfK",
		"46")
	),
	false,
	"a8e283e0cf790d4472a78903580168c7b22373e83c239fab91d719fa647083c2"
);

$question05 = new election(
	5,
	1,
	false,
	"Integrate an improved mining function into the GUI?",
	"",
	100000,
	10000,
	0.2,
	"1540944000",
	array(
	new answer(
		"Yes",
		"QWC1WEquw7cAQD1fTYmhSKG6uPXJyntH9jSdS1kq4Dami93xGAmWNBFbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXcRWzkR",
		"0"),
	new answer(
		"No",
		"QWC1euDAjic618ZhJLdKqBBi8nL8ZkrkDHMZ6duQcZS3Vgaox7wJvihbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXeJFGUh",
		"1100000"),
	new answer(
		"Create lightwallet!",
		"QWC1T7fbpHCAqk7ZUpJVx7MUtZXw3E1MMVz24N7a4vBEdTDPeLVuTWubs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXeqj1Y9",
		"9985")
	),
	false
	,"93253e642a16788e539777de4bec7bae7c146cfe2b2b903c465b36aa8694f358"
);

$question06 = new election(
	6,
	2,
	true,
	"Should QWC be listed on CryTrEx.com?",
	"A successful vote does not mean that Qwertycoin will be listed on CryTrEx.com. For this listing we need QWC equivalent<br/>to 150,000 CRYT these funds must be provided by the community through further donations. But we will get in contact with this Exchange as soon as possible.",
	10000,
	14000,
	0.7,
	"1540944000",
	array(
	new answer(
		"Yes",
		"QWC1QK6ZAsRULDYT4ZmSEB6TwkExcxm8sTjyCE9n2Y7W6ZoLbiP4bAdbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXfpvLNa"),
	new answer(
		"No",
		"QWC1Eeo5mywDTyoMqgiqpiEc5yKduf784QGTDJV45q2vBiQDLEq2xxubs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXd3MBAp")
	),
	false,
	"c57c4ff3d2fe649bcd9fcb017c3b524aede8ae6b89a6c3acd12db7000000c299"
);

$question07 = new election(
	7,
	2,
	true,
	"List QWC on STEX.com Exchange?",
	"A successful vote does not mean that Qwertycoin will be listed automatically on STEX.com. For this listing we need QWC equivalent<br/>to 0.5 BTC these funds must be provided by the community through further donations if the collected funds are not enough. But we will get in contact with this Exchange as soon as possible.",
	10000,
	250000,
	0.5,
	"1540944000",
	array(
	new answer(
		"Yes",
		"QWC1Lrvysrq1Yrfcy3xPKCRENJ9HDfUFZ9biyGkEDE3DUbWRbm7TwBbbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXexn2cG"),
	new answer(
		"No",
		"QWC1SFdVsV6hpiEYmiqf6Lc5gTWWbLbbmRdYTAKWFiHFLUTTqCDN9iVbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXgTBXt1")
	),
	true,
	"1e8911e4d3c953fc60b683e7b1559b9ab938d8586eeb5fbf2c4d9e8fc6d82e25"
);

$question08 = new election(
	8,
	3,
	true,
	"Donate for the mobile application!",
	"This Election is for fasten up the process while our external dev is creating our Qwertycoin mobile Wallet App for Android and Apple iOS.<br/>Every donated Coin will transfered to this app development fund. You can donate as many times as you want. The more tips the developer receives,<br/>the more motivated he is to implement this honorable task.",
	1000,
	10000,
	1,
	"1540944000",
	array(
	new answer(
		"Like",
		"QWC1gSHC8cziLJLSDTh9zddhNtaPeNM6DUZmA7T91L317BaxXqjqUxDbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXdUqYfs",
		"15868888")
	),
	false,
	""
);

$question09 = new election(
	9,
	1,
	false,
	"Start an Exchange? - Qwexchange",
	"Do we need an own Exchange? Called Qwexchange.",
	100000,
	250000,
	5,
	"1924905600",
	array(
	new answer(
		"Yes",
		"QWC1P6GyM58QsPdjbcW3ZMAiwvhJaDJtedFT5jZEM9FZBBKfMrZRiQMbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXbrz4Ao"),
	new answer(
		"No",
		"QWC1HgmKRQwNMZ198EeWNeLDiKHfUc9UeM2L96XZ6aFwirhZLjR4TyXbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXfaQ7fc")
	),
	true,
	"633cc096745a0250f279092b48946c460c66e98e0320300da59a814d75a426ea"
);

$question10 = new election(
	10,
	3,
	true,
	"Should we develop a faucet?",
	"Do we need a Faucet? If yes, we have to pay external developers from upwork to solve this quest.",
	10000000,
	250,
	0.25,
	"1540944000",
	array(
	new answer(
		"Yes",
		"QWC1dboD83uXF25GMHtNVjFnsNub6HmeQQqe8E7nMdyTCgCitj9RNyBbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXh7xCQ2"),
	new answer(
		"No",
		"QWC1YMKK4rP26pVsXw4qzd5akFjnHQqjRZuinGtrwH9KK8qCRrmSdCRbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXegiAfN")
	),
	false,
	"69d50a83a05b6e23e2488d6c514b14ba228fd8db2ac584637f391f1803aef628"
);

$question11 = new election(
	11,//electionID
	2,//category
	true,//realtimeGoal
	"Donate for a SWFT Exchange Listing",//question
	"A successful vote does not mean that Qwertycoin will be listed immediately on SWFT. For this listing we need funds<br/>between 2 and 3 BTC these funds must be provided by the community through these donations. After Donation Campaign is done, we will get in contact with this Exchange as soon as possible.",//description
	5000000,//minimumvotes
	1000,//qwcpervote
	2.0,//neededBTC
	"1564531200",//deadline
	array(
	new answer(
		"Yes",
		"QWC1SmHGe2E1eq7L8V2Xi3WX6oVV4Gw6DcgY2JZbk3x4KymzVHWJZJVbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXdzJaND"),
	new answer(
		"Yes",
		"QWC1hfWMZ9YfjVTSpbsPS4E3qtvppb3ZnXpk43TReRFhj5SQiTZk4dbbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXgrFdCL")
	),
	true,//ac()
	""//paymentID
);

$question12 = new election(
	12,//electionID
	2,//category
	true,//realtimeGoal
	"Donate for a FINEXBOX Exchange Listing",//question
	"A successful vote does not mean that Qwertycoin will be listed immediately on FINEXBOX. For this listing we need funds<br/>between 0.2 and 0.5 BTC these funds must be provided by the community through these donations. After Donation Campaign is done, we will get in contact with this Exchange as soon as possible.",//description
	50000,//minimumvotes
	1000,//qwcpervote
	0.2,//neededBTC
	"1564531200",//deadline
	array(
	new answer(
		"OK",
		"QWC1er9YDTPS2yq8jykUUqZqx1k9PQdmfYkPuBRxeccXJp7pxG73WmKbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXfFGUHY"),
	),
	true,//active?
	""//paymentID
);

$question13 = new election(
	13,//electionID
	2,//category
	true,//realtimeGoal
	"Donate for a COINTIGER Exchange Listing",//question
	"A successful vote does not mean that Qwertycoin will be listed immediately on FINEXBOX. For this listing we need funds<br/>between 8 AND 9 BTC these funds must be provided by the community through these donations. After Donation Campaign is done, we will get in contact with this Exchange as soon as possible.",//description
	21900000,//minimumvotes
	1000,//qwcpervote
	9,//neededBTC
	"1564531200",//deadline
	array(
	new answer(
		"OK",
		"QWC1ct8kV4KfLffDu1AXwNaPojEuXiRVHNmaRLVNN5dk2UMPZT9Xs9fbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXgkMqaU"),
	),
	true,//active?
	""//paymentID
);

$question14 = new election(
	14,//electionID
	3,//category
	false,//realtimeGoal
	"Donate for our graphic artists",//question
	"Here you can vote for the Graphic artists who create our Design Works.",//description
	100000,//minimumvotes
	1000,//qwcpervote
	0,//neededBTC
	"1577750400",//deadline
	array(
	new answer(
		"DON",
		"QWC1JtqqVcvKts1j4BEVfW4VWaLGemxXkWB6L4uoTENuCjc9EULDEVKbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXfAFMN2")
	),
	true,//active?
	""//paymentID
);

$question15 = new election(
	15,//electionID
	3,//category
	false,//realtimeGoal
	"Donate for our core developers",//question
	"Here you can vote for the Graphic artists who create our Design Works.",//description
	100000,//minimumvotes
	1000,//qwcpervote
	0,//neededBTC
	"1577750400",//deadline
	array(
	new answer(
		"DON",
		"QWC1DgpzfWZhFbaGHCT2JCSHu81V19eTXbCQaHG5f4Tc1sJZWjkkQdbbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXg7aU6J")
	),
	true,//active?
	""//paymentID
);

$question16 = new election(
	16,//electionID
	3,//category
	false,//realtimeGoal
	"Donate for our mobile developers",//question
	"Here you can vote for mobile developers",//description
	100000,//minimumvotes
	1000,//qwcpervote
	0,//neededBTC
	"1577750400",//deadline
	array(
	new answer(
		"DON",
		"QWC1bcGt5hiFMX1nmQBFUfMPTQm1TzbSEidVXc2fH6RfcJ6CHnozZGZbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXe2yVF9")
	),
	true,//active?
	""//paymentID
);

$question17 = new election(
	17,//electionID
	3,//category
	false,//realtimeGoal
	"Donate for marketing activities",//question
	"Here you can donate for several marketing activities",//description
	100000,//minimumvotes
	1000,//qwcpervote
	0,//neededBTC
	"1577750400",//deadline
	array(
	new answer(
		"DON",
		"QWC1bSVF5AoHwsAeMUyneR6Lwp1YgkG4mMGrYTG3vrv6eQdovem2K89bs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXbVAqj6")
	),
	true,//active?
	""//paymentID
);

$question18 = new election(
	18,//electionID
	3,//category
	false,//realtimeGoal
	"Donate for the IT Crew",//question
	"Here you can donate for the IT Infrastructure guys",//description
	100000,//minimumvotes
	1000,//qwcpervote
	0,//neededBTC
	"1577750400",//deadline
	array(
	new answer(
		"DON",
		"QWC1G8mbU6oVNUP4gjxbm5hRQDfCxuVXLgkHpDh8amaC7QWaMymdsedbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXcjwmxi")
	),
	true,//active?
	""//paymentID
);

$question19 = new election(
	19,//electionID
	1,//category
	false,//realtimeGoal
	"Deleted Test Election",//question
	"This is an Test Election it was without valid addresses, so the total voting balance was incorrect. Due to this bug we have to delete this Election in order to correct the total voted amount.<br/>Please do not vote to this Election!",//description
	1000000000,//minimumvotes
	100,//qwcpervote
	0,//neededBTC
	"1924905600",//deadline
	array(
	new answer(
		"YES",
		"QWC1PmpV66vMq4aDmSteiYMYfd4bepYc9U1g5vxsHvDQgahVq3Ys7eubs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXffbVD7"),
	new answer(
		"NOPE",
		"QWC1PmpV66vMq4aDmSteiYMYfd4bepYc9U1g5vxsHvDQgahVq3Ys7eubs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXffbVD7")
	),
	false,//active?
	""//paymentID
);

$question20 = new election(
	20,//electionID
	1,//category
	false,//realtimeGoal
	"Add 10% Government fee for QWC foundation",//question
	"At the request of the Chinese Community, we made the following vote: 10% of the miners earnings (Base Block Reward) go to the Qwertycoin Foundation for exchange and promotion campaigns.<br/>This Voting will collect enough funds for paying the developers to solve this Case asap. Visit our websites to get informed quickly.",//description
	1000000,//minimumvotes
	100,//qwcpervote
	0,//neededBTC
	"1924905600",//deadline
	array(
	new answer(
		"YES",
		"QWC1bAxvzowCSoDh8LZwKmaZEaUBtkb5vUsovDbChK4ZBFn1JSfmpCubs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXdaBtqd"),
	new answer(
		"NO",
		"QWC1G1Y2iyE8cYnaRuwUGGKpwVWWFYH2J8LmJvV74JUQdZg3bXPQoMwbs2gGrTbtPcFgrp3Yf7K5kGEp1vyvZq8b9JFXbW66Xe")
	),
	true,//active?
	""//paymentID
);

$questions = array(
	$question01,$question02,$question03,$question04,$question05,
	$question06,$question07,$question08,$question09,$question10,
	$question11,$question12,$question13,$question14,$question15,
	$question16,$question17,$question18,$question19,$question20
);
