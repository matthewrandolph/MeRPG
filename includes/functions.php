<?php
/*
 * Returns the current level, calculated from the amount of experience points
 */
  function calculate_level ($exp) {
    if ($exp < 100) {
      return 1;
    }
    if ($exp < 200) {
      return 2;
    }
    if ($exp < 1000) {
      return 3;
    }
    if ($exp < 6000) {
      return 4;
    }
    if ($exp < 13000) {
      return 5;
    }
    if ($exp < 23000) {
      return 6;
    }
    if ($exp < 34000) {
      return 7;
    }
    if ($exp < 50000) {
      return 8;
    }
    if ($exp < 71000) {
      return 9;
    }
    if ($exp < 105000) {
      return 10;
    }
    if ($exp < 145000) {
      return 11;
    }
    if ($exp < 210000) {
      return 12;
    }
    if ($exp < 295000) {
      return 13;
    }
    if ($exp < 425000) {
      return 14;
    }
    if ($exp < 600000) {
      return 15;
    }
    if ($exp < 850000) {
      return 16;
    }
    if ($exp < 1200000) {
      return 17;
    }
    if ($exp < 1700000) {
      return 18;
    }
    if ($exp < 2400000) {
      return 19;
    }
    $exp = $exp - 2400000;        // Subtract the level 20 threshold
    $exp = floor($exp / 700000);  // Divide by 700,000 and round down to get the amound of levels past 20
    $lvl = $exp + 20;             // Add 20 back into the additional levels
    return $lvl;
  }

  /*
   * Returns the amount of experience points required to hit the next level
   */
  function to_next_level ($exp) {
    if ($exp < 100) {
      return 100;
    }
    if ($exp < 200) {
      return 200;
    }
    if ($exp < 1000) {
      return 1000;
    }
    if ($exp < 6000) {
      return 6000;
    }
    if ($exp < 13000) {
      return 13000;
    }
    if ($exp < 23000) {
      return 23000;
    }
    if ($exp < 34000) {
      return 34000;
    }
    if ($exp < 50000) {
      return 50000;
    }
    if ($exp < 71000) {
      return 71000;
    }
    if ($exp < 105000) {
      return 105000;
    }
    if ($exp < 145000) {
      return 145000;
    }
    if ($exp < 210000) {
      return 210000;
    }
    if ($exp < 295000) {
      return 295000;
    }
    if ($exp < 425000) {
      return 425000;
    }
    if ($exp < 600000) {
      return 600000;
    }
    if ($exp < 850000) {
      return 850000;
    }
    if ($exp < 1200000) {
      return 1200000;
    }
    if ($exp < 1700000) {
      return 1700000;
    }
    if ($exp < 2400000) {
      return 2400000;
    }
    // if $exp is above 2,400,000
    $exp -= 2400000;              // Subtract the level 20 threshold
    $lvl = floor($exp / 700000);  // Divide by 700,000, rounding down
    $lvl += 1;                    // Increment the level by one (get the next level!)
    $exp = ($lvl * 700000);       // Calculate the extra exp to get to this level
    $exp += 2400000;              // Find the total exp needed

    return $exp;
  }

  function award_experience ($lvl, $intensity, $time, $category) {

    if ($category == "minutes") {
      $hours = $time / 60.0;
    } else {
      $hours = $time;
    }

    if ($intensity == 1) {
      $lvl -= 1;
    } else if ($intensity == 3) {
      $lvl += 1;
    }

    switch ($lvl) {
    case 0:
        return floor(50 * $hours);
        break;
    case 1:
        return floor(100 * $hours);
        break;
    case 2:
        return floor(150 * $hours);
        break;
    case 3:
        return floor(200 * $hours);
        break;
    case 4:
        return floor(300 * $hours);
        break;
    case 5:
        return floor(400 * $hours);
        break;
    case 6:
        return floor(600 * $hours);
        break;
    case 7:
        return floor(800 * $hours);
        break;
    case 8:
        return floor(1200 * $hours);
        break;
    case 9:
        return floor(1600 * $hours);
        break;
    case 10:
        return floor(2400 * $hours);
        break;
    case 11:
        return floor(3200 * $hours);
        break;
    case 12:
        return floor(4800 * $hours);
        break;
    case 13:
        return floor(6400 * $hours);
        break;
    case 14:
        return floor(9600 * $hours);
        break;
    case 15:
        return floor(12800 * $hours);
        break;
    case 16:
        return floor(19200 * $hours);
        break;
    case 17:
        return floor(25600 * $hours);
        break;
    case 18:
        return floor(38400 * $hours);
        break;
    case 19:
        return floor(51200 * $hours);
        break;
    case 20:
        return floor(76800 * $hours);
        break;
    case 21:
        return floor(137000 * $hours);
        break;
    case 22:
        return floor(205000 * $hours);
        break;
    default:
        return floor(273000 * $hours);
        break;
    }
  }
?>
