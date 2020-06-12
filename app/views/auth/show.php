<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">IP</th>
      <th scope="col">HOST</th>
      <th scope="col">Browser</th>
      <th scope="col">Date</th>
      <th scope="col">Page</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php 
      foreach($rows as $temp){
        echo "<th scope='row'>".$temp['id']."</th>";
        echo "<td>".$temp['ip']."</td>";
        echo "<td>".$temp['host']."</td>";
        echo "<td>".$temp['browser']."</td>";
        echo "<td>".$temp['created_at']."</td>";
        echo "<td>".$temp['page']."</td>";
        echo "</tr>";
      }
    ?>
  </tbody>
</table>
<?php 
echo "<br>";
  echo $prev;
  echo $next;
  echo "<br>";
  foreach ($pages as $i) {
    echo $i;
  }
?>