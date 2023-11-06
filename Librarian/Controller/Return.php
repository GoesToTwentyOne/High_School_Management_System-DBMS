<?php
require_once '../Model/model.php';

function BookReturn($data)
{
    $student = GetBalance($data['uid']);
    $balance = $student["balance"];
    $teacher = GetBalanceT($data['uid']);
    $balancet = $teacher["balance"];
    $studentSuccess = false;
    $teacherSuccess = false;
    
    $issue = IssueDetails($data['id']);
    $due = $issue["duedate"];
    $ret = $data['rdate'];
    $date1 = date_create($due);
    $date2 = date_create($ret);
    $diff = date_diff($date1, $date2);
    $x = ($diff->format("%R%a"));
    if ($x > 0) {
        $x = $x * 10;
    } else {
        $x = 0;
    }
    $fine = $x;
    $balance = $balance - $fine;
    $studentSuccess = true;
    ReturnBook($data['uid'], $data['bid'], $data['status'], $data['id'], $ret, $fine, $balance);

    $issueT = IssueDetailsT($data['id']);
    $dueT = $issueT["duedate"];
    $retT = $data['rdate'];
    $date1T = date_create($dueT);
    $date2T = date_create($retT);
    $diffT = date_diff($date1T, $date2T);
    $xT = ($diffT->format("%R%a"));
    if ($xT > 0) {
        $xT = $xT * 10;
    } else {
        $xT = 0;
    }
    $fineT = $xT;
    $balancet = $balancet - $fineT;
    $teacherSuccess = true;
    ReturnBookT($data['uid'], $data['bid'], $data['status'], $data['id'], $retT, $fineT, $balancet);
    if ($studentSuccess || $teacherSuccess) {
        return true;
    } else {
        return false;
    }
}