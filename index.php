<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DATABASE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="assets.style.css" />
    <script src="assets/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    <?php require_once "./app/controller.php"; ?>
</head>

<body class="container">
    <h1 class="display-4 text-center">Telebelerin Siyahisi</h1>
    <div>
        <button data-toggle="modal" data-target="#add" class="btn btn-outline-info btn-sm float-right">Elave et</button>
    </div>
    <table class="table">
        <tr>
            <th>S/N</th>
            <th>Ad Soyad</th>
            <th>Ixtisas</th>
            <th>Telefon</th>
            <th>Cins</th>
            <th>Emeliyyatlar</th>
        </tr>
        <?php foreach ($emps as $key => $emp) { ?>
            <tr>
                <td><?= $key+1 ?></td>
                <td><?= $emp['adsoyad'] ?></td>
                <td><?= $emp['ixtisas'] ?></td>
                <td><?= $emp['telefon'] ?></td>
                <td><?= $emp['cinsi'] ?></td>
                <td>
                    <button onclick="editView(<?= $emp['id'] ?>)" class="btn btn-outline-warning btn-sm">Duzelis et</button>
                    <button onclick="deleteEmp(<?= $emp['id'] ?>,'<?= $emp['adsoyad'] ?>')" class="btn btn-outline-danger btn-sm">Sil</button>
                </td>
            </tr>
            <?php } ?>
    </table>

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yeni telebe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="fullname" class="col-form-label">Ad Soyad:</label>
                            <input type="text" class="form-control" id="fullname" require="require" name="fullname" />
                        </div>
                        <div class="form-group">
                            <label for="specialty" class="col-form-label">Ixtisas:</label>
                            <input type="text" class="form-control" id="specialty" require="require" name="specialty" />
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-form-label">Elaqe Nomresi:</label>
                            <input type="tel" class="form-control" id="phone" require="require" name="phone" />
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-form-label">Cins:</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="" selected="selected" disabled="disabled">Secim edin.</option>
                                <option value="kisi">Kisi</option>
                                <option value="qadin">Qadin</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bagla</button>
                            <button class="btn btn-primary" name="add_emp">Yadda Saxla</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Redakte telebe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" name="edit_id" id="edit_id" />
                        <div class="form-group">
                            <label for="edit_fullname" class="col-form-label">Ad Soyad:</label>
                            <input type="text" class="form-control" id="edit_fullname" require="require" name="fullname" />
                        </div>
                        <div class="form-group">
                            <label for="edit_specialty" class="col-form-label">Ixtisas:</label>
                            <input type="text" class="form-control" id="edit_specialty" require="require" name="specialty" />
                        </div>
                        <div class="form-group">
                            <label for="edit_phone" class="col-form-label">Elaqe Nomresi:</label>
                            <input type="tel" class="form-control" id="edit_phone" require="require" name="phone" />
                        </div>
                        <div class="form-group">
                            <label for="edit_gender" class="col-form-label">Cins:</label>
                            <select name="gender" id="edit_gender" class="form-control">
                                <option value="" selected="selected" disabled="disabled">Secim edin.</option>
                                <option value="kisi">Kisi</option>
                                <option value="qadin">Qadin</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bagla</button>
                            <button class="btn btn-primary" name="edit_emp">Yadda Saxla</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>