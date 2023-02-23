<?php
if (!empty($_POST['hangar'])&& empty($_POST['id'])) {
    $hangar = $_POST['hangar'];
    $occupe = $_POST['occupe'];
    $sql = "INSERT INTO hangar(numero_hangar,occupe) VALUES(:hangar,:occupe)";
    $statement = $db->prepare($sql);
    if (
        $statement->execute([
            ':hangar' => $hangar,
            ':occupe' => $occupe
        ])
    ) {
        // $id = $db->lastInsertId();
        $message = " Hangar <strong> $hangar </strong> ajouté";
    }
    ;

}


if (!empty($_POST['id'])) {
    $occupe = $_POST['occupe'];
    $numero_hangar = $_POST["hangar"];

    $sql = 'UPDATE hangar SET numero_hangar = :numero_hangar, occupe=:occupe  WHERE id = :id ';
    $statement = $db->prepare($sql);
    if (
        $statement->execute([
            ':numero_hangar' => $numero_hangar,
            'occupe'=>$occupe,
            ':id' => $_POST['id']
        ])
    ) {

        $message = "MIs a jour effectuee";
    }
    // $id = $pdo->lastInsertId();

}
; ?>
<?php
require('header.php')
; ?>

<div class="container w-50">
    <div class="card">
        <div class="card-header">
            <h2>Creer hangar</h2>
        </div>
        <div class="card-body">
            <?php if (!empty($message)):
                ; ?>
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <input type="hidden" name="id" id="id" class="form-control w-50 mx-auto my-4" value="<?php if (isset($_GET['id'])) {
                    echo $_GET['id'];
                } else {
                    echo "";
                } ?>">

                <div class="form-group">
                    <label for="hangar">Numero hangar</label>
                    <input type="text" name="hangar" id="hangar" class="form-control w-50 mx-auto my-4" value="<?php if (isset($_GET['id'])) {
                        $sql = "SELECT * FROM hangar WHERE id=:id";
                        $statement = $db->prepare($sql);
                        $statement->execute([':id' => $_GET['id']]);
                        $data = $statement->fetch(PDO::FETCH_OBJ);
                        echo $data->numero_hangar;
                    } else {
                        echo "";
                    } ?>">
                </div>
                <div class="form-group">
                    <select class="form-select text-center w-50 mx-auto my-2" name="occupe"
                            aria-label="Default select example" id="occupe">
                        <option selected>Statut d'occupation</option>
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>
                </div>
                <div class="form-group my-2">
                    <input type="submit" value="<?php if (empty($_GET['id'])) {
                        echo "Ajouter hangar";
                    } else {
                        echo "Mettre a jour";
                    } ?>" class="btn btn-success" onclick="setModifier(88)">
                </div>

            </form>
        </div>
    </div>

</div>
<?php require('footer.php') ?>