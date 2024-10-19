<?php

function calculateResult($marks) {
    // Validate marks
    foreach ($marks as $mark) {
        if ($mark < 0 || $mark > 100) {
            return "Mark range is invalid.";
        }
    }

    // Check for fail condition
    foreach ($marks as $mark) {
        if ($mark < 33) {
            return "The student has failed.";
        }
    }

    // Calculate total and average marks
    $totalMarks = array_sum($marks);
    $averageMarks = $totalMarks / count($marks);

    // Determine grade using switch-case
    switch (true) {
        case ($averageMarks >= 80 && $averageMarks <= 100):
            $grade = 'A+';
            break;
        case ($averageMarks >= 70 && $averageMarks < 80):
            $grade = 'A';
            break;
        case ($averageMarks >= 60 && $averageMarks < 70):
            $grade = 'A-';
            break;
        case ($averageMarks >= 50 && $averageMarks < 60):
            $grade = 'B';
            break;
        case ($averageMarks >= 40 && $averageMarks < 50):
            $grade = 'C';
            break;
        case ($averageMarks >= 33 && $averageMarks < 40):
            $grade = 'D';
            break;
        default:
            $grade = 'F'; // This case is not needed since we check for fail earlier
            break;
    }

    // Output results
    return [
        'Total Marks' => $totalMarks , 
        'Average Marks' => number_format($averageMarks, 2),
        'Grade' => $grade
    ];
}


$marks = [81, 72, 59, 66, 74]; // Sample marks
$result = calculateResult($marks);

if (is_array($result)) {
    echo "Total Marks: " . $result['Total Marks'] . "<br>";
    echo "Average Marks: " . $result['Average Marks'] . "<br>";
    echo "Grade: " . $result['Grade'] . "<br>";
} else {
    
    echo $result . "\n";
}
?>