<?php

// Simulated array of suggestions (replace with your actual data source)
$suggestions = array(
    "Search suggestion 1",
    "Search suggestion 2",
    "Search suggestion 3",
    "Search suggestion 4",
    "Search suggestion 5"
);

// Retrieve the search query from the POST request
$query = $_POST['query'];

// Filter suggestions based on the query
$filteredSuggestions = array();
foreach ($suggestions as $suggestion) {
    if (stripos($suggestion, $query) !== false) {
        $filteredSuggestions[] = $suggestion;
    }
}

// Output the filtered suggestions as HTML
if (!empty($filteredSuggestions)) {
    foreach ($filteredSuggestions as $suggestion) {
        echo "<div class='suggestion'>$suggestion</div>";
    }
} else {
    echo "<div class='no-suggestions'>No suggestions found</div>";
}

?>
