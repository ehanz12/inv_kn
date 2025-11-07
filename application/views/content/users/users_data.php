<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <!-- <h5 class="m-b-10">Data Users</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Users Data</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <div class="main-body">
          <div class="page-wrapper">
            <!-- [ Main Content ] start -->
            <div class="row">
              <!-- [ basic-table ] start -->
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Data Users</h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-user-plus"></i>Tambah Users
                    </button>
                  </div>
                  <div class="card-block table-border-style">

                    <?php
                    // print_r($result);
                    ?>
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nama </th>
                            <th>Username</th>
                            <th>Alamat</th>
                            <th>Level</th>
                            <th>Jabatan</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($result as $k) {
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['nama_operator'] ?></td>
                              <td><?= $k['username'] ?></td>
                              <td><?= $k['alamat'] ?></td>
                              <td><?= $k['level'] ?></td>
                              <td><?= $k['jabatan'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_user="<?= $k['id_user'] ?>" data-nama_operator="<?= $k['nama_operator'] ?>" data-username="<?= $k['username'] ?>" data-password="<?= $k['password'] ?>" data-level="<?= $k['level'] ?>" data-jabatan="<?= $k['jabatan'] ?>" data-alamat="<?= $k['alamat'] ?>">
                                    <i class="feather icon-edit-2"></i>Edit
                                  </button>
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="<?= base_url() ?>users/users/delete/<?= $k['id_user'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                    <i class="feather icon-trash-2"></i>Hapus
                                  </a>
                                </div>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- [ basic-table ] end -->

            </div>
            <!-- [ Main Content ] end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>users/users/add">
        <div class="modal-body">

          <div class="form-group">
            <label for="nama_operator">Nama</label>
            <input type="text" class="form-control" id="nama_operator" name="nama_operator" placeholder="Ketik nama operator anda" maxlength="100" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="ketik username" maxlength="100" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
              <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" autocomplete="off" required>
              </div>
          </div>
          <div class="form-group">
            <label for="level">Level</label>
            <select class="form-control chosen-select" id="level" name="level" autocomplete="off" required>
              <option value="" disabled selected hidden> - Pilih Level - </option>
              <option value="admin">Admin</option>
              <option value="accounting">Accounting</option>
              <option value="gudang">Gudang</option>
              <option value="lab">Lab</option>
              <option value="melting">Melting</option>
              <option value="marketing">Marketing</option>
              <option value="packing">Packing</option>
              <option value="utility">Utility</option>
              <option value="stockkeeper">Stock Keeper</option>
            </select>
          </div>
          <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select class="form-control chosen-select" id="jabatan" name="jabatan" autocomplete="off" required>
              <option value="" disabled selected hidden> - Pilih Jabatan - </option>
              <option value="admin">Admin</option>
              <option value="operator">Operator</option>
              <option value="supervisor">Supervisor</option>
            </select>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" autocomplete="off"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>users/users/update">
        <div class="modal-body">
          <div class="form-group">
            <label for="e_nama_operator">Nama</label>
            <input type="hidden" id="e_id_user" name="id_user">
            <input type="text" class="form-control" id="e_nama_operator" name="nama_operator" placeholder="Nama" maxlength="100" required>
          </div>
          <div class="form-group">
            <label for="e_username">Username</label>
            <input type="text" class="form-control" id="e_username" name="username" placeholder="Username" maxlength="100" required>
          </div>
          <div class="form-group">
            <label for="e_level">Level</label>
            <select class="form-control chosen-select" id="e_level" name="level" required>
              <option value="admin">Admin</option>
              <option value="accounting">Accounting</option>
              <option value="gudang">Gudang</option>
              <option value="lab">Lab</option>
              <option value="melting">Melting</option>
              <option value="marketing">Marketing</option>
              <option value="packing">Packing</option>
              <option value="utility">Utility</option>
            </select>
          </div>
          <div class="form-group">
            <label for="e_jabatan">Jabatan</label>
            <select class="form-control chosen-select" id="e_jabatan" name="jabatan" required>
              <option value="admin">Admin</option>
              <option value="operator">Operator</option>
              <option value="supervisor">Supervisor</option>
              <option value="manager">Manager</option>
              <option value="pm">Plant Manager</option>
              <option value="direktur">Direktur</option>
            </select>
          </div>
          <div class="form-group">
            <label for="e_alamat">Alamat</label>
            <textarea class="form-control" id="e_alamat" name="alamat" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#edit').on('show.bs.modal', function(event) {
      var id_user = $(event.relatedTarget).data('id_user')
      var nama_operator = $(event.relatedTarget).data('nama_operator')
      var username = $(event.relatedTarget).data('username')
      var level = $(event.relatedTarget).data('level')
      var jabatan = $(event.relatedTarget).data('jabatan')
      var alamat = $(event.relatedTarget).data('alamat')

      $(this).find('#e_id_user').val(id_user)
      $(this).find('#e_nama_operator').val(nama_operator)
      $(this).find('#e_username').val(username)
      $(this).find('#e_level').val(level)
      $(this).find('#e_level').trigger("chosen:updated")
      $(this).find('#e_jabatan').val(jabatan)
      $(this).find('#e_jabatan').trigger("chosen:updated")
      $(this).find('#e_alamat').val(alamat)
      // alert(id_user)
    })

})


</script>


