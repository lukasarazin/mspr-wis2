<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/database.php';


function createdPostTime($timePost)
{
    $time_ago = strtotime($timePost);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes = round($seconds / 60); // 60 = secondes
    $hours = round($seconds / 3600); // 3600 = 60 minutes * 60 secondes
    $days = round($seconds / 86400); // 86400 = 24 heures * 60 minutes * 60 secondes
    $weeks = round($seconds / 604800); // 604800 = 7 jours * 24 heures * 60 minutes * 60 secondes
    $months = round($seconds / 2629440); // ((365+365+365+365+366)/5/12)*24*60*60
    $years = round($seconds / 31553280); // (365+365+365+365+366)/5*24*60*60

    if ($seconds <= 60) {
        return "Publié maintenant";
    }

    else if ($minutes<=60)
    {
        if($minutes==1)
        {
            return "Publié il y a 1 minute";
        }
        else
        {
            return "Publié il y a $minutes minutes";
        }
    }

    else if ($hours <=24)
    {
        if($hours==1)
        {
            return "Publié il y a 1 heure";
        }
        else
        {
            return "Publié il y a $hours heures";
        }
    }

    else if ($days <=7)
    {
        if($days==1)
        {
            return "Publié hier";
        }
        else
        {
            return "Publié il y a $days jours";
        }
    }

    else if ($weeks <=4.3) //4.3 == 52/12
    {
        if($weeks==1)
        {
            return "Publié il y a 1 semaine";
        }
        else
        {
            return "Publié il y a $weeks semaines";
        }
    }

    else if ($months <=12)
    {
        if($months==1)
        {
            return "Publié il y a 1 mois";
        }
        else
        {
            return "Publié il y a $months mois";
        }
    }

    else
    {
        if($years==1)
        {
            return "Publié il y a 1 an";
        }
        else
        {
            return "Publié il y a $years ans";
        }
    }
}


function upadtedPostTime($timeupdate)
{
    $timeupdate_ago = strtotime($timeupdate);
    $current_time = time();
    $time_difference = $current_time - $timeupdate_ago;
    $seconds = $time_difference;
    $minutes = round($seconds / 60); // 60 = secondes
    $hours = round($seconds / 3600); // 3600 = 60 minutes * 60 secondes
    $days = round($seconds / 86400); // 86400 = 24 heures * 60 minutes * 60 secondes
    $weeks = round($seconds / 604800); // 604800 = 7 jours * 24 heures * 60 minutes * 60 secondes
    $months = round($seconds / 2629440); // ((365+365+365+365+366)/5/12)*24*60*60
    $years = round($seconds / 31553280); // (365+365+365+365+366)/5*24*60*60

    if ($seconds <= 60) {
        return "Modifié maintenant";
    }

    else if ($minutes<=60)
    {
        if($minutes==1)
        {
            return "Modifié il y a 1 minute";
        }
        else
        {
            return "Modifié il y a $minutes minutes";
        }
    }

    else if ($hours <=24)
    {
        if($hours==1)
        {
            return "Modifié il y a 1 heure";
        }
        else
        {
            return "Modifié il y a $hours heures";
        }
    }

    else if ($days <=7)
    {
        if($days==1)
        {
            return "Modifié hier";
        }
        else
        {
            return "Modifié il y a $days jours";
        }
    }

    else if ($weeks <=4.3) //4.3 == 52/12
    {
        if($weeks==1)
        {
            return "Modifié il y a 1 semaine";
        }
        else
        {
            return "Modifié il y a $weeks semaines";
        }
    }

    else if ($months <=12)
    {
        if($months==1)
        {
            return "Modifié il y a 1 mois";
        }
        else
        {
            return "Modifié il y a $months mois";
        }
    }

    else
    {
        if($years==1)
        {
            return "Modifié il y a 1 an";
        }
        else
        {
            return "Modifié il y a $years ans";
        }
    }
}