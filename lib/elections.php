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

class election {
    public $electionID;
    public $category;
    public $realtimeGoal;
    public $question;
    public $description;
    public $minimumvotes;
    public $qwcpervote;
    public $neededBTC;
    public $deadline;
    public $answers = array();
    public $active;
    public $paymentID;

	public function __construct(int $electionID, int $category, bool $realtimeGoal, string $question, string $description, float $minimumvotes, float $qwcpervote, string $neededBTC, string $deadline, $answers, bool $active = true, string $paymentID) {
        $this->electionID = $electionID;
        $this->category = $category;
        $this->realtimeGoal = $realtimeGoal;
        $this->question = $question;
        $this->description = $description;
        $this->minimumvotes = $minimumvotes;
        $this->qwcpervote = $qwcpervote;
        $this->neededBTC = $neededBTC;
        $this->deadline = $deadline;
        $this->answers = $answers;
        $this->active = $active;
        $this->paymentID = $paymentID;
	}

	public function getElectionID() {
        return $this->electionID;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getRealtimeGoal() {
        return $this->realtimeGoal;
    }

    public function getQuestion() {
        return $this->question;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getMinimumVotes() {
        return $this->minimumvotes;
    }

    public function getQWCPerVote() {
        return $this->qwcpervote;
    }

    public function getNeededBTC() {
        return $this->neededBTC;
    }

    public function getDeadline() {
        return $this->deadline;
    }

    public function getAnswers() {
        return $this->answers;
    }

    public function getStatus() {
        $status = "false";
        if($this->active != 0) $status = "true";
        else $status = "false";
        return $status;
    }

    public function getPaymentID() {
        return $this->paymentID;
    }
}

class answer {
    public $answer;
    public $qwcaddress;
    public $finalBalance;

    public function __construct(string $answer, string $qwcaddress, string $finalBalance = null) {
        $this->answer = $answer;
        $this->qwcaddress = $qwcaddress;
        $this->finalBalance = $finalBalance;
    }

    public function getAnswer() {
        return $this->answer;
    }

    public function getAddress() {
        return $this->qwcaddress;
    }

    public function getFinalBalance() {
        return $this->finalBalance;
    }
}
