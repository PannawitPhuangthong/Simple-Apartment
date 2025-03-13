<!DOCTYPE html>
<html>
<head>
    <title> ใบสัญญา </title>
</head>
<body>
<?php

/*
// Database connection settings
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $cm_name, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from the database
$sql = "SELECT * FROM contracts";
$result = $conn->query($sql);

// Display data
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $contract = new Contract(
            $row["ct_id"],
            new DateTime($row["ct_date"]),
            $row["rm_deposit"],
            new DateTime($row["date_in"]),
            new DateTime($row["date_out"]),
            $row["Ccm_id"],
            $row["Crm_id"]
        );
        $contracts[] = $contract; // Add to the contracts array
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
*/

class contract {
    private int $ct_id;
    private DateTimeInterface $ct_date;
    private int $rm_deposit;
    private DateTimeInterface $date_in;
    private DateTimeInterface $date_out;
    private string $Ccm_id;
    private string $Crm_id;

    // Constructor
    public function __construct(
        int $ct_id,
        DateTimeInterface $ct_date,
        int $rm_deposit,
        DateTimeInterface $date_in,
        DateTimeInterface $date_out,
        string $Ccm_id,
        string $Crm_id
    ) {
        $this->ct_id = $ct_id;
        $this->ct_date = $ct_date;
        $this->rm_deposit = $rm_deposit;
        $this->date_in = $date_in;
        $this->date_out = $date_out;
        $this->Ccm_id = $Ccm_id;
        $this->Crm_id = $Crm_id;
    }

    // Getter methods
    public function getId(): int {
        return $this->ct_id;
    }

    public function getDate(): DateTimeInterface {
        return $this->ct_date;
    }

    public function getDeposit(): int {
        return $this->rm_deposit;
    }

    public function getDateIn(): DateTimeInterface {
        return $this->date_in;
    }

    public function getDateOut(): DateTimeInterface {
        return $this->date_out;
    }

    public function getCustomerId(): string {
        return $this->Ccm_id;
    }

    public function getRoomsId(): string {
        return $this->Crm_id;
    }
}

// Example usage
//$contract = new Contract(1, '2024-04-23', 1000, '2024-05-01', '2025-04-30', 'C123', 'R456');

// Create a new instance of the Contract class
$contract = new Contract(
    1,
    new DateTime('2024-04-23'),
    1000,
    new DateTime('2024-05-01'),
    new DateTime('2025-04-30'),
    'C123',
    'R456'
);

// Output contract details
    echo "Contract ID: " . $contract->getId() . "<br>";
    echo "Date: " . $contract->getDate()->format('Y-m-d') . "<br>";
    echo "Deposit: $" . $contract->getDeposit() . "<br>";
    echo "Move-in Date: " . $contract->getDateIn()->format('Y-m-d') . "<br>";
    echo "Move-out Date: " . $contract->getDateOut()->format('Y-m-d') . "<br>";
    echo "Customer ID: " . $contract->getCustomerId() . "<br>";
    echo "Room ID: " . $contract->getRoomsId() . "<br>";

?>

</body>
</html>
