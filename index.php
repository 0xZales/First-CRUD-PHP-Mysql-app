<?php
define("dbname", "MARCHE");

require('f_connexion.php');
$db = connect(host, username, password, dbname);

$sql = "SELECT * FROM hangar";
$statement = $db->prepare($sql);
$statement->execute();
$hangars = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require('header.php') ?>
<script>
 
  function setModifier(id) {
    window.location.href = "?action=show&id=" + id;

  }
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
<h1 class="mb-5 mt-4">GESTION HANGAR</h1>
<?php require('creer.php') ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>List des hangars</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">

        <tr class="text-center">
          <th>Id</th>
          <th>Nom hangar </th>
          <th>Occupé</th>
          <th colspan="2">Action</th>
          <!-- <th>Supprimer</th> -->
        </tr>
        <?php foreach ($hangars as $hangar): ?>
          <tr class="text-center">
            <td>
              <?php echo $hangar->id; ?>
            </td>
            <td>

              <?php echo $hangar->numero_hangar; ?>
            </td>
            <td>
              <?php echo $hangar->occupe; ?>
            </td>
            <!-- href="modifier.php?id=/<?= $hangar->id ?>"  -->
            <td><button class="btn btn-info fs-10" onclick="setModifier(<?php echo $hangar->id; ?>)">Mofidier</button>
            </td>
            <td><a onclick=" return confirm('Voulez vous supprimer cet hangar ?')"
                 href="supprimer.php?id=<?= $hangar->id ?>" class="btn btn-danger fs-10">Supprimer</a></td>
          </tr>
        <?php endforeach; ?>


      </table>
    </div>
  </div>

</div>

<?php require('footer.php') ?>