<?php
// Get MongoDB client and select database and collection
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->database_name->collection_name;

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = $_POST["name"];
  $age = $_POST["age"];
  $dob = $_POST["dob"];
  $email = $_POST["email"];
  $contact = $_POST["contact"];
  
  // Create document object
  $document = [
    'name' => $name,
    'age' => $age,
    'dob' => $dob,
    'email' => $email,
    'contact' => $contact
  ];
  
  // Insert document into collection
  $result = $collection->insertOne($document);
  
  // Check if the document was inserted successfully
  if ($result->getInsertedCount() == 1) {
    echo "Profile saved successfully.";
  } else {
    echo "Error: Profile not saved.";
  }
}
?>