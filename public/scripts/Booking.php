<?php

class Booking
{

    private $dbh;

    private $bookingsTableName = 'bookings';

    /**
     * Booking constructor.
     * @param string $DATABASE_HOST
     * @param string $DATABASE_NAME
     * @param string $DATABASE_USER
     * @param string $DATABASE_PASS
     */
    public function __construct($DATABASE_HOST, $DATABASE_NAME, $DATABASE_USER, $DATABASE_PASS)
    {
        try {

            $this->dbh
             = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function index()
    {
        $statement = $this->dbh->query('SELECT * FROM ' . $this->bookingsTableName);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add(DateTimeImmutable $bookingDate)
    {
        $statement = $this->dbh->prepare(
            'INSERT INTO ' . $this->bookingsTableName . ' (booking_date) VALUES (:bookingDate)'
        );

        if (false === $statement) {
            throw new Exception('Invalid prepare statement');
        }

        if (false === $statement->execute([
                ':bookingDate' => $bookingDate->format('Y-m-d'),
            ])) {
            throw new Exception(implode(' ', $statement->errorInfo()));
        }
    }

    public function delete($id)
    {
        $statement = $this->dbh->prepare(
            'DELETE from ' . $this->bookingsTableName . ' WHERE id = :id'
        );
        if (false === $statement) {
            throw new Exception('Invalid prepare statement');
        }
        if (false === $statement->execute([':id' => $id])) {
            throw new Exception(implode(' ', $statement->errorInfo()));
        }
    }

}
?>