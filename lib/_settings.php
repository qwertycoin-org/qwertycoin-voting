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

define('DEBUG', "OFF");
error_reporting(0);
ini_set('display_errors', 0);

// General
$electionID = 0;

// Page variables
if(!isset($_GET['election'])) {
	$election = false; } else {
	$election = (int)$_GET['election'];
	$electionID = $election-1;
}

if(!isset($_GET['api'])) $api = false;
else $api = true;

if(!isset($_GET['starttopic'])) $starttopic = false;
else $starttopic = true;
