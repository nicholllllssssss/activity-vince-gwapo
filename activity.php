<?php

function calculateTimeStats($logs) {
    $employeeID = "V0001";
    $employeeName = "VINCE";
    $employeePosition = "Software Engineer";
    $totalHoursPerDay = [];
    $overtimePerDay = [];
    $totalHoursUntilMonthStart = 0;
    $totalOvertimeUntilMonthStart = 0;
    $totalHoursUntilMonthEnd = 0;
    $totalOvertimeUntilMonthEnd = 0;


    // Loop through each day's log
    foreach ($logs as $dayLogs) {
        $dailyHours = 0;
        $dailyOvertime = 0;

        // Loop through each log entry for the day
        for ($i = 0; $i < count($dayLogs); $i += 2) {
            $loginTime = strtotime($dayLogs[$i]);
            $logoutTime = strtotime($dayLogs[$i + 1]);

            // Calculate the time difference in seconds
            $timeDiff = $logoutTime - $loginTime;

            // Convert seconds to hours
            $hoursWorked = $timeDiff / 3600;

            // If worked more than 8 hours, calculate overtime
            if ($hoursWorked > 9) {
                $overtime = $hoursWorked - 9;
                $dailyOvertime += $overtime;
            }

            // Add hours worked to daily total
            $dailyHours += $hoursWorked;
        }

        
        
        
        
        
        
        
        // Record total hours and overtime for the day
        $totalHoursPerDay[] = $dailyHours;
        $overtimePerDay[] = $dailyOvertime;

        // Update totals until month start and end
        $totalHoursUntilMonthStart += $dailyHours;
        $totalOvertimeUntilMonthStart += $dailyOvertime;


        if (date('d', strtotime($dayLogs[0])) <= 15) {
            $totalHoursUntilMonthEnd += $dailyHours;
            $totalOvertimeUntilMonthEnd += $dailyOvertime;
        }
    }


    function calculateBasicSalary($b, $lvl)
    {
        // Initialize the basic salary variable
        $basicSalary = 0;
    
        // Determine the bonus based on the employee level
        if ($lvl === 1) {
            $b = 75;
        } elseif ($lvl === 2) {
            $b = 120;
        } elseif ($lvl === 3) {
            $b = 200;
        }
    
        // Calculate the basic salary
        $basicSalary = 31 * $b; // Assuming a base salary of $100
        
        return $basicSalary;
    }
    
    // Example usage
    $b = 0; 
    $lvl = 1; // Example employee level

    echo "Basic Salary: $" . calculateBasicSalary($b, $lvl) . "<br>";
    
    
    

    function TotalHoursperDay ($AM_IN, $PM_OUT)
    {
    
        
    
     $hours = ($PM_OUT-$AM_IN)-1;
    
     return $hours;
    
    }
      $AM_IN = 8; // Example number of hours worked
      $PM_OUT = 17; // Example hourly wage
    
      $hours = TotalHoursperDay($AM_IN, $PM_OUT);

      echo "total hours: " . $hours . "<br>";






    

    
    





    return [
        'employee_ID' => $employeeID,
        'employee_Name' => $employeeName,
        'employee_Position' => $employeePosition,
        'total_hours_per_day' => $totalHoursPerDay,
        'overtime_per_day' => $overtimePerDay,
        'total_hours_until_month_start' => $totalHoursUntilMonthStart,
        'total_overtime_until_month_start' => $totalOvertimeUntilMonthStart,
        'total_hours_until_month_end' => $totalHoursUntilMonthEnd,
        'total_overtime_until_month_end' => $totalOvertimeUntilMonthEnd
        
    ];
}

// Example usage
$logs = [
    ['09:00', '17:00'], // Example log for the first day
    ['09:00', '18:30'], // Example log for the second day
    // Add more log entries for each day of the month
];

$results = calculateTimeStats($logs);
echo "employee ID: " . $results['employee_ID'] . "<br>";
echo "employee Name: " . $results['employee_Name'] . "<br>";
echo "employee Position: " . $results['employee_Position'] . "<br>";
echo "Total Hours Per Day: " . implode(", ", $results['total_hours_per_day']) . "<br>";
echo "Overtime Per Day: " . implode(", ", $results['overtime_per_day']) . "<br>";
echo "Total Hours Until Month Start: " . $results['total_hours_until_month_start'] . "<br>";
echo "Total Overtime Until Month Start: " . $results['total_overtime_until_month_start'] . "<br>";
echo "Total Hours Until Month End: " . $results['total_hours_until_month_end'] . "<br>";
echo "Total Overtime Until Month End: " . $results['total_overtime_until_month_end'] . "<br>";





?>