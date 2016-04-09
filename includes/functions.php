<?php
/*
 * Returns the current level, calculated from the amount of experience points
 */
  function calculate_level ($exp) {
    if ($exp < 1300) {
      return 1;
    }
    if ($exp < 3300) {
      return 2;
    }
    if ($exp < 6000) {
      return 3;
    }
    if ($exp < 10000) {
      return 4;
    }
    if ($exp < 15000) {
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
    if ($exp < 1300) {
      return 1300;
    }
    if ($exp < 3300) {
      return 3300;
    }
    if ($exp < 6000) {
      return 6000;
    }
    if ($exp < 10000) {
      return 10000;
    }
    if ($exp < 15000) {
      return 15000;
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

  function award_experience ($lvl, $intensity) {
    $offset = (mt_rand(50, 150) / 100.0);

    if ($intensity == 1) {
      $lvl -= 1;
    } else if ($intensity == 3) {
      $lvl += 1;
    }

    switch ($lvl) {
    case 0:
        return floor(50 * $offset);
        break;
    case 1:
        return floor(100 * $offset);
        break;
    case 2:
        return floor(150 * $offset);
        break;
    case 3:
        return floor(200 * $offset);
        break;
    case 4:
        return floor(300 * $offset);
        break;
    case 5:
        return floor(400 * $offset);
        break;
    case 6:
        return floor(600 * $offset);
        break;
    case 7:
        return floor(800 * $offset);
        break;
    case 8:
        return floor(1200 * $offset);
        break;
    case 9:
        return floor(1600 * $offset);
        break;
    case 10:
        return floor(2400 * $offset);
        break;
    case 11:
        return floor(3200 * $offset);
        break;
    case 12:
        return floor(4800 * $offset);
        break;
    case 13:
        return floor(6400 * $offset);
        break;
    case 14:
        return floor(9600 * $offset);
        break;
    case 15:
        return floor(12800 * $offset);
        break;
    case 16:
        return floor(19200 * $offset);
        break;
    case 17:
        return floor(25600 * $offset);
        break;
    case 18:
        return floor(38400 * $offset);
        break;
    case 19:
        return floor(51200 * $offset);
        break;
    case 20:
        return floor(76800 * $offset);
        break;
    case 21:
        return floor(137000 * $offset);
        break;
    case 22:
        return floor(205000 * $offset);
        break;
    default:
        return floor(273000 * $offset);
        break;
    }
  }
?>
