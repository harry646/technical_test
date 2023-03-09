<?php

require_once('Person.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $persons = [];
  $number_of_persons = $_POST['number_of_persons'];
  for ($i = 0; $i < $number_of_persons; $i++) {
    $age_of_death = $_POST["age_of_death_".$i];
    $year_of_death = $_POST["year_of_death_".$i];
    $person = new Person($age_of_death, $year_of_death);
    array_push($persons, $person);
  }

  $total_number_of_people_killed = 0;
  $number_of_years = 0;
  for ($year = 1; $year <= 100; $year++) {
    $number_of_people_killed = 0;
    foreach ($persons as $person) {
      $number_of_people_killed += $person->get_number_of_people_killed($year);
    }
    $total_number_of_people_killed += $number_of_people_killed;
    if ($number_of_people_killed > 0) {
      $number_of_years++;
    }
  }
  $average = $total_number_of_people_killed / $number_of_years;

  echo "The average number of people killed per year is: $average";
}
?>

<form method="POST">
  <label for="number_of_persons">Number of persons:</label>
  <input type="number" id="number_of_persons" name="number_of_persons" value="2"><br>

  <?php for ($i = 0; $i < 2; $i++) { ?>
    <label for="age_of_death_<?php echo $i; ?>">Age of death for person <?php echo $i+1; ?>:</label>
    <input type="number" id="age_of_death_<?php echo $i; ?>" name="age_of_death_<?php echo $i; ?>" value="<?php echo ($i == 0) ? 10 : 13; ?>"><br>

    <label for="year_of_death_<?php echo $i; ?>">Year of death for person <?php echo $i+1; ?>:</label>
    <input type="number" id="year
    of_death<?php echo $i; ?>" name="year_of_death_<?php echo $i; ?>" value="<?php echo ($i == 0) ? 12 : 17; ?>"><br>
  <?php } ?>
  <input type="submit" value="Calculate">
</form>