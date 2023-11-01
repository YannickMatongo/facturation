<?php

class Database
{
    private $host = "mysql:dbname=crud_ajax";
    private $user = "root";
    private $pswd = "root";

    private function getConnection()
    {
        // to recover database connection errors
        try {
            return new PDO($this->host, $this->user, $this->pswd);
        } catch (PDOException $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    public function create(string $customer, string $cashier, int $amount, int $received, int $returned, string $state)
    {
        //write the request to send it to the server
        $q = $this->getConnection()->prepare("INSERT INTO factures (:customer, :cashier, :amount, :received, :returned, :state) VALUEs (customer, cashier, amount, received , returned, state)");

        return $q->execute([
            'customer' => $customer,
            'cashier' => $cashier,
            'amount' => $amount,
            'received' => $received,
            'returned' => $returned,
            'state' => $state
        ]);
    }
}
