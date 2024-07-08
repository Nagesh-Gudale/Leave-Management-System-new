<?php
include '../include/session.php';
include '../include/db-connection.php';


$sql = "SELECT l.*, lt.id , lt.type,u.full_name FROM leaves as l INNER JOIN leave_types as lt ON l.leave_type_id=lt.id INNER JOIN users as u ON l.user_id=u.id WHERE l.status='pending'";
$result = $conn->query($sql);
$leaves = [];
while ($row = $result->fetch_assoc()) {
    $leaves[] = $row;
}
$sql2 = "SELECT * FROM leave_types";
$result2 = $conn->query($sql2);
$leaves_types = [];
while ($rows = $result2->fetch_assoc()) {
    $leaves_types[] = $rows;
}
function dateDiffInDays($date1, $date2)
{

    // Calculating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400));
}
include '../templates/admin-header.php';
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Leave List</h1>
    </div><!-- End Page Title -->
   
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Leave ID</th>
                                    <th>User</th>
                                    <th>Type</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($leaves as $leave): ?>
                                    <tr>
                                    <?php $dateDiff = dateDiffInDays($leave["start_date"], $leave["end_date"]);?>
                                    <tr>
                                        <td><?php echo $leave["id"]; ?></td>
                                        <td><?php echo $leave["full_name"]; ?></td>
                                        <td><?php echo $leave["type"]; ?></td>
                                        <td><?php echo $leave["start_date"]; ?></td>
                                        <td><?php echo $leave["end_date"]; ?></td>
                                        <td><?php echo $dateDiff; ?></td>
                                        <td><?php echo $leave['reason']; ?></td>
                                        <td><?php echo $leave["status"]; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#Acceptmodal"
                                                onclick='setUpdateData(<?php echo json_encode($leave); ?>)'>Accept</button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#Rejectmodal"
                                                onclick="setDeleteData(<?php echo $leave['id']; ?>)">Reject</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

        </div>
    </div>
</div>
<div class="modal fade" id="Rejectmodal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Reject Application</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="reject_id" name="reject_id" value="<?php echo $leave['id'];?>" >
                    <p>Are you sure you want to Reject the Application?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="Reject_app" class="btn btn-danger">Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="Acceptmodal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Accept Application</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="deleteDepartmentId" name="department_d">
                    <p>Are you sure you want to Accept the Application?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="delete_department" class="btn btn-success">Accept</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function setDeleteData(id) {
        document.getElementById('reject_id').value = id;
    }
</script>
<?php
include '../templates/footer.php';
?>