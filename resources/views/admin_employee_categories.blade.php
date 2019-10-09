<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box">
            <div class="box-header">
                <h4> Servicii
                    <button class="btn btn-primary set-add-btn" data-toggle="modal" style=" float: right">
                        Adauga serviciu
                    </button>
                </h4>
            </div>

            <div style="width: 100%;">

                <form method="GET" action="#">
                    <select style="margin-left: 20px; float: left; height: 36px;margin-top: -2px;">
                        <option value="">Alege categorie</option>
                        <option value="7">Marketplace2</option>
                        <option value="14">cse</option>
                    </select>
                    <button style="margin-left: 20px; float: left; margin-top: -2px;" class="btn btn-primary">Cauta
                    </button>
                </form>
            </div>

            <div id="default" style="margin-top: 20px;">
                <div class="box-body">
                    <form action="#" method="get">
                        <table id="example2" class="table table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Department Name</th>
                                    <th>Added Date</th>
                                    <th>
                                        <center>Action</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Packing</td>
                                    <td>2017-03-02</td>
                                    <td align="center">
                                        <a onclick="" href="#">
                                            <input id="openEdit" style="margin-top: 5px;" class="btn btn-primary" value="Edit" type="button">
                                        </a>
                                        <a href="javascript:void(0);" onclick="">
                                            <input style="margin-top: 5px;" class="btn btn-danger" name="Delete" value="Delete" type="button">
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p>
                        </p>
                        <ul class="pagination">
                            <li class="disabled"><span>«</span>
                            </li>
                            <li class="active"><span>1</span>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#" rel="next">»</a>
                            </li>
                        </ul>
                        <p></p>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>
</div>