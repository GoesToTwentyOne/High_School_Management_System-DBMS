<?php 
require_once '../Model/model.php';

function Recharge($data)
{
    $student = GetBalance($data['uid']);
    $teacher = GetBalanceT($data['uid']);
    
    $studentSuccess = false;
    $teacherSuccess = false;

    if (is_array($student)) {
        $balance = $student["balance"];
        $balance += $data['amount'];
        Balance($data['uid'], $balance);
        $studentSuccess = true;
    }

    if (is_array($teacher)) {
        $balance = $teacher["balance"];
        $balance += $data['amount'];
        BalanceT($data['uid'], $balance);
        $teacherSuccess = true;
    }

 
    if ($studentSuccess || $teacherSuccess) {
        return true;
    } else {
        return false;
    }
}
?>

