<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="css/all.css" rel="stylesheet" type="text/css" />
    <link href="css/components.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/master.css" rel="stylesheet" id="master-css">
    <link rel="shortcut icon" href="../images/logo.jpg" />
    <link rel="icon" href="../images/logo.jpg" />

    <title>Sacco-Plus Membership</title>
</head>

<body>
    <input type="checkbox" name="nav-toggle" id="nav-toggle">
    <?php require_once("sidebar.php"); ?>

    <div class="main-content">
        <div class="header">
            <h2>
                <label for="nav-toggle">
                    <i class="fas fa-bars"></i>
                </label>
                Membership
            </h2>

            <div class="search-wrapper">
                <i class="fas fa-search"></i>
                <input type="text" name="search" id="search" placeholder="Search here ...">
            </div>

            <div class="user-wrapper">
                <img src="../images/user_profiles/1.jpg" height="40px" width="40px" alt="" class="profilephoto">
                <div>
                    <h4 class="username">Richard Onyango</h4>
                    <small class="role">System Admin</small>
                </div>
            </div>
        </div>

        <main id="membership">
            <div class="card" id="main-content-card">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col col-md-2">
                                <section class="filterpane">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12" id="filteroptions">
                                                <div class="form-group"></div>
                                                <button class="btn btn-sm btn-secondary w-100 mb-1" id="resendinvitation"><i class="fal fa-share-square fa-lg fa-fw"></i> Resend Welcome Message</button>
                                                <button class="btn btn-sm btn-success w-100 mb-1" id="addnewmember"><i class="fal fa-plus-circle fa-lg fa-fw"></i> Add New</button>
                                                <button class="btn btn-sm btn-secondary w-100 mb-1" id="filteroptionsbutton"><i class="fal fa-search fa-lg fa-fw"></i> Filter Members</button>
                                                <button class="btn btn-sm btn-secondary w-100 mb-1" id="cancelfilteroptions"><i class="fal fa-search-minus fa-lg fa-fw"></i> Cancel Filter</button>
                                                <!-- Members List  -->
                                                <select name="memberslist" id="memberslist" class="customerslisttreeview mt-2" multiple></select>
                                                <div class="row mt-2">
                                                    <!-- <div class="check-group mr-3">
                                                        <input type="checkbox" name="currentmembers" id="currentmembers" checked="checked">
                                                        <label for="currentmembers" class="check-label">Current</label>
                                                    </div>

                                                    <div class="check-group">
                                                        <input type="checkbox" name="pastmembers" id="pastmembers">
                                                        <label for="pastmembers" class="check-label">Past</label>
                                                    </div> -->
                                                    <div class="form-group col">
                                                        <label for="filterliststatus">Status</label>
                                                        <select name="filterliststatus" id="filterliststatus" class="form-control form-control-sm">
                                                            <option value="">&lt;All&gt;</option>
                                                            <option value="active">Current</option>
                                                            <option value="withdrawn">Past</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col">
                                                        <label for="filterlistcategory">Category</label>
                                                        <select name="filterlistcategory" id="filterlistcategory" class="form-control form-control-sm">
                                                            <option value="">&lt;All&gt;</option>
                                                            <option value="member">Members</option>
                                                            <option value="nonmember">Non-member</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <p class='bg-secondary p-1  mt-1 text-white text-center'><span id="listcount">No</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <div class="col">
                                <div class="alert alert-primary">
                                    <div class="row">
                                        <div class="col">
                                            <label for="cardmemberno">Member No: <span class='font-weight-bold' id="cardmemberno"></span></label>
                                        </div>

                                        <div class="col">
                                            <label for="cardmembernames">Names: <span class='font-weight-bold' id="cardmembernames"></span></label>
                                        </div>

                                        <div class="col">
                                            <label for="cardmembercompany">Company: <span class='font-weight-bold' id="cardmembercompany"></span></label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label for="cardmemberloans">Unpaid Loans: <span class='font-weight-bold' id="cardmemberloans">0.00</span></label>
                                        </div>

                                        <div class="col">
                                            <label for="cardmembershares">Shares: <span class='font-weight-bold' id="cardmembershares">0.00</span></label>
                                        </div>

                                        <div class="col">
                                            <label for="cardmemberdeposits">Total Deposits: <span class='font-weight-bold' id="cardmemberdeposits">0.00</span></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="cardtotalsavings">Total Savings <span class='font-weight-bold' id="cardtotalsavings">0.00</span></label>
                                        </div>

                                        <div class="col">
                                            <label for="cardgauaranteeddeposits">Guaranteed Deposits: <span class='font-weight-bold' id="cardgauaranteeddeposits">0.00</span></label>
                                        </div>

                                        <div class="col">
                                            <label for="cardfreedeposits">Free Deposits: <span class='font-weight-bold' id="cardfreedeposits">0.00</span></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Set up tabs  -->
                                <nav class="nav-justified ">
                                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#memberdetails" role="tab" aria-controls="pop1" aria-selected="true">Bio Data</a>
                                        <a class="nav-item nav-link" id="pop1-tab" data-toggle="tab" href="#people" role="tab" aria-controls="pop1" aria-selected="true">People</a>
                                        <a class="nav-item nav-link" id="statement-tab" data-toggle="tab" href="#statement" role="tab" aria-controls="pop2" aria-selected="false">Statement</a>
                                        <a class="nav-item nav-link" id="pop2-tab" data-toggle="tab" href="#deliveries" role="tab" aria-controls="pop5" aria-selected="false">Deliveries</a>
                                        <a class="nav-item nav-link" id="pop2-tab" data-toggle="tab" href="#charges" role="tab" aria-controls="pop2" aria-selected="false">Charges</a>
                                        <a class="nav-item nav-link" id="pop2-tab" data-toggle="tab" href="#memberloans" role="tab" aria-controls="pop3" aria-selected="false">Loans</a>
                                        <a class="nav-item nav-link" id="pop2-tab" data-toggle="tab" href="#schedules" role="tab" aria-controls="pop4" aria-selected="false">Schedules</a>
                                        <a class="nav-item nav-link" id="pop2-tab" data-toggle="tab" href="#notes" role="tab" aria-controls="pop4" aria-selected="false">Notes</a>
                                        <a class="nav-item nav-link" id="pop2-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="pop5" aria-selected="false">Documents</a>
                                        <a class="nav-item nav-link" id="pop2-tab" data-toggle="tab" href="#products" role="tab" aria-controls="pop5" aria-selected="false">Products</a>
                                        <a class="nav-item nav-link" id="pop2-tab" data-toggle="tab" href="#withdrawal" role="tab" aria-controls="pop6" aria-selected="false">Withdrawal</a>
                                    </div>
                                </nav>

                                <div class="tab-content text-left" id="nav-tabContent">
                                    <!-- People Tab  -->
                                    <div class="tab-pane fade" id="people" role="tabpanel">
                                        <div class="card containergroup mt-3 mb-3">
                                            <div class="card-header">
                                                <h5>Beneficiaries</h5>
                                            </div>
                                            <div class="card-body">
                                                <div id="peoplenotifications" class="mt-2"></div>
                                                <table class="table table-sm table-striped" id="beneficiarieslist">
                                                    <thead>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Relationship</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Doc Number</th>
                                                        <th>Percentage</th>
                                                        <th>&nbsp;</th>
                                                        <th>&nbsp;</th>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="card containergroup mb-3">
                                            <div class="card-header">
                                                <h5>Dependants</h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-sm table-striped" id="dependantslist">
                                                    <thead>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Relationship</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Doc Number</th>
                                                        <th>Status</th>
                                                        <th>&nbsp;</th>
                                                        <th>&nbsp;</th>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <button class="btn btn-sm btn-success" id="addnewperson"><i class="fal fa-plus fa-lg fa-fw"></i> Add New Person</button>

                                    </div>
                                    <!-- End of People Tab  -->

                                    <!-- Member Details Tab  -->
                                    <div class="tab-pane fade show active" id="memberdetails" role="tabpanel">
                                        <div class="pt-3"></div>
                                        <div id="userdetails" class="mt-2">
                                            <div class="card containergroup">
                                                <div class="card-header">
                                                    <h5>Identification Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div id="membernotifications"></div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <input type="hidden" id="memberid" value="0">
                                                                <input type="hidden" id="accountactive" value="0">
                                                                <label for="memberno">Member Number:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-hashtag fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="memberno" id="memberno" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="firstname">First Name:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-user-tie  fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="firstname" id="firstname" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="middlename">Middle Name:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-user-tie  fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="middlename" id="middlename" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="lastname">Last Name:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-user-tie  fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="lastname" id="lastname" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="company">Company:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-building  fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <select name="company" id="company" class="form-control  form-control-sm"></select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="gender">Gender:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-venus-mars fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <select name="gender" id="gender" class="form-control  form-control-sm">
                                                                        <option value="">&lt;Choose&gt;</option>
                                                                        <option value="male">Male</option>
                                                                        <option value="female">Female</option>
                                                                    </select></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="dob">Date of Birth:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-calendar-alt  fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="dob" id="dob" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="nationality">Nationality:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-flag fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <select name="nationality" id="nationality" class="form-control  form-control-sm"></gender></select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col form-group">
                                                            <label for="membercategory">Category:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-flag fa-sm fa-fw"></i></span>
                                                                </div>
                                                                <select name="membercategory" id="membercategory" class="form-control  form-control-sm">
                                                                    <option value="">&lt;Choose&gt;</option>
                                                                    <option value="member">Member</option>
                                                                    <option value="nonmember">Non Member</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col"></div>
                                                        <div class="col"></div>
                                                        <div class="col"></div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card containergroup mt-2">
                                                <div class="card-header ">
                                                    <h5>Contact Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="postaladdress">Postal Address:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-mailbox fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="postaladdress" id="postaladdress" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="town">Town:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-hotel  fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="town" id="town" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="postalcode">Postal Code:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-code-branch fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="postalcode" id="postalcode" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="physicaladdress">Physical Address:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-house fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="physicaladdress" id="physicaladdress" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="email">Email:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-at  fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="email" name="email" id="email" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="mobile">Mobile:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-phone  fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="number" name="mobile" id="mobile" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="alternativemobile">Alternative Mobile:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-phone  fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="number" name="alternativemobile" id="alternativemobile" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col form-group">
                                                            <label for="">&nbsp;</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <input type="checkbox" id="welfaremember">
                                                                    </div>
                                                                </div>
                                                                <input type="text" id="" class="form-control form-control-sm" value="Welfare member">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card containergroup mt-2">
                                                <div class="card-header ">
                                                    <h5>Identification Document</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="iddocument">ID Document:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-address-card fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <select type="text" name="iddocument" id="iddocument" class="form-control  form-control-sm"></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="documentnumber"><span id="documentname">Document</span> Number:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-hashtag  fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="documentnumber" id="documentnumber" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="expirydate">Expiry Date:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-calendar-alt fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="expirydate" id="expirydate" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <input type="hidden" name="iddocumentexpires" id="iddocumentexpires" value="0">
                                                            <div class=" form-group">
                                                                <label for="">&nbsp;</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <input type="checkbox" id="expirydatereminder">
                                                                        </div>
                                                                    </div>

                                                                    <input type="text" id="" class="form-control form-control-sm" value="Remind on expiry">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card containergroup mt-2">
                                                <div class="card-header ">
                                                    <h5>Next of Kin Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="nokname">Name:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-hashtag fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="nokname" id="nokname" class="form-control  form-control-sm">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="nokrelationship">Relationship:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-link  fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <select name="nokrelationship" id="nokrelationship" class="form-control  form-control-sm"></select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="nokmobile">Mobile:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-phone  fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="nokmobile" id="nokmobile" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="nokemail">Email:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-at  fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="nokemail" id="nokemail" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="card containergroup mt-2 mb-3">
                                                <div class="card-header ">
                                                    <h5>Other Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="payrollno">Payroll No</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-hashtag fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="text" name="payrollno" id="payrollno" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="monthlydeposit">Monthly Deposit:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-coins  fa-sm fa-fw"></i></span>
                                                                    </div>
                                                                    <input type="number" name="monthlydeposit" id="monthlydeposit" class="form-control  form-control-sm" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="registrationpaymentmode">Pay registration via</label>
                                                                <select name="registrationpaymentmode" id="registrationpaymentmode" class="form-control form-control-sm"></select>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="registrationpaymentreference">Referenceno</label>
                                                                <input type="text" name="registrationpaymentreference" id="registrationpaymentreference" class="form-control form-control-sm">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col from-group">
                                                            <label for="saccoinsider">Insider Information</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <input type="checkbox" id="saccoinsider">
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control form-control-sm" value="Sacco insider">
                                                            </div>
                                                        </div>

                                                        <div class="col form-group">
                                                            <label for="insidercategory">Category</label>
                                                            <select name="insidercategory" id="insidercategory" class="form-control form-control-sm">
                                                                <option value="">&lt;Choose&gt;</option>
                                                                <option value="director">Director</option>
                                                                <option value="employee">Employee</option>
                                                            </select>
                                                        </div>

                                                        <div class="col form-group">
                                                            <label for="insiderrole">Role</label>
                                                            <select name="insiderrole" id="insiderrole" class="form-control form-control-sm">
                                                                <option value="">&lt;Choose&gt;</option>
                                                                <option value="chairman">Chairman</option>
                                                                <option value="secretary">Secretary</option>
                                                                <option value="treasurer">Treasurer</option>
                                                                <option value="comitteemember">Comittee Member</option>
                                                                <option value="employee">Employee</option>
                                                            </select>
                                                        </div>

                                                        <div class="col form-group">
                                                            <label for="saccoinsider">Term Expires</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <input type="checkbox" id="insidertermexpires">
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control form-control-sm" id="insidertermexpirydate">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <button class='btn btn-success btn-sm' id='savemember'><i class="fal fa-save fa-lg fa-fw"></i> Save Member</button>
                                                    <button class='btn btn-outline-danger btn-sm' id='clearmember'><i class="fal fa-broom fa-lg fa-fw"></i> Clear Fields</button>

                                                    <div class="btn-group btn-group-justified" role="group">
                                                        <div class="btn-group-vertical" role="group">
                                                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fal fa-upload fa-lg fa-fw"></i> Import Data
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                <a class="dropdown-item" href="#" id='importmembersbutton'>Members Details</a>
                                                                <a class="dropdown-item" href="#" id='importsharesbutton'>Shares</a>
                                                                <a class="dropdown-item" href="#" id='importsavingssbutton'>Savings</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button class='btn btn-outline-secondary btn-sm' id='membersavingsrefundbutton'><i class="fal fa-hand-holding-usd fa-lg fa-fw"></i> Refund Savings</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Member Details Tab  -->

                                    <!-- Member statement tab  -->
                                    <div class="tab-pane fade" id="statement" role="tabpanel" aria-labelledby="pop2-tab">
                                        <div class="pt-3"></div>
                                        <!-- <h4>Statement</h4> -->
                                        <div class="card containergroup">
                                            <div class="card-header">
                                                <h5>Filter Options</h5>
                                            </div>
                                            <div class="card-body">
                                                <div id="statementnotifications"></div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="statementtype">Statement type</label>
                                                            <select name="statementtype" id="statementtype" class="form-control form-control-sm">
                                                                <option value="combined">Combined</option>
                                                                <option value="loan">Loans</option>
                                                                <option value="deposits">Deposits</option>
                                                                <option value="shares">Shares</option>
                                                                <option value="savings">Savings</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col form-group" style="display:none" id="statementsharetypediv">
                                                        <label for="statementsharetype">Share Type</label>
                                                        <select name="statementsharetype" id="statementsharetype" class="form-control form-control-sm"></select>
                                                    </div>

                                                    <div class="col form-group" style="display:none" id="statementsavingstypediv">
                                                        <label for="statementsavingstype">Saving Type</label>
                                                        <select name="statementsavingstype" id="statementsavingstype" class="form-control form-control-sm"></select>
                                                    </div>

                                                    <div class="col form-group col-md-2">
                                                        <label for="personremindonidexpiry">Date Range</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" class="check-control" id="statementalldates" name="statementalldates">
                                                                </div>
                                                            </div>
                                                            <input type="text" id="" class="form-control form-control-sm" value="All Dates">
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="statementstartdate">Start date:</label>
                                                            <input type="text" name="statementstartdate" id="statementstartdate" class="form-control form-control-sm">
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="statementenddate">End date:</label>
                                                            <input type="text" name="statementenddate" id="statementenddate" class="form-control form-control-sm">
                                                        </div>
                                                    </div>

                                                    <div class="col col-md-2">
                                                        <div class="form-group">
                                                            <label for="generatestatement">&nbsp;</label>
                                                            <button class="btn btn-sm btn-success d-block" id="generatestatement"> Generate</button>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Statement Details -->
                                                <div id="statementbody"></div>
                                                <div id="statementsummary">
                                                    <div id="loansummary">
                                                        <p class="font-weight-bold border-bottom">
                                                            Outstanding Loans
                                                        </p>
                                                        <div class="row">

                                                            <div class="col d-flex flex-column">
                                                                <label for="statementprincipal">Principal</label>
                                                                <label id="statementprincipal" class="font-weight-bold">0.00</label>
                                                            </div>

                                                            <div class="col d-flex flex-column">
                                                                <label for="statementinterest">Interest</label>
                                                                <label id="statementinterest" class="font-weight-bold">0.00</label>
                                                            </div>

                                                            <div class="col d-flex flex-column">
                                                                <label for="statementpenalty">Penalty</label>
                                                                <label id="statementpenalty" class="font-weight-bold">0.00</label>
                                                            </div>

                                                            <div class="col d-flex flex-column">
                                                                <label for="statementother">Other</label>
                                                                <label id="statementother" class="font-weight-bold">0.00</label>
                                                            </div>

                                                            <div class="col d-flex flex-column">
                                                                <label for="statementloantotal">Total</label>
                                                                <label id="statementloantotal" class="font-weight-bold">0.00</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div id="contributionsummary">
                                                        <p class="font-weight-bold border-bottom">
                                                            Members Contribution Summary
                                                        </p>
                                                        <div class="row">

                                                            <div class="col d-flex flex-column">
                                                                <label for="statementdeposits">Deposits</label>
                                                                <label id="statementdeposits" class="font-weight-bold">0.00</label>
                                                            </div>

                                                            <div class="col d-flex flex-column">
                                                                <label for="statementshares">Shares</label>
                                                                <label id="statementshares" class="font-weight-bold">0.00</label>
                                                            </div>

                                                            <div class="col d-flex flex-column">
                                                                <label for="statementsavings">Savings</label>
                                                                <label id="statementsavings" class="font-weight-bold">0.00</label>
                                                            </div>

                                                            <div class="col d-flex flex-column">
                                                                <label for="statementcontributiontotal">Total</label>
                                                                <label id="statementcontributiontotal" class="font-weight-bold">0.00</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- End of member statement tab  -->

                                    <!-- Member Charges tab  -->
                                    <div class="tab-pane fade" id="charges" role="tabpanel" aria-labelledby="pop2-tab">
                                        <div class="pt-3"></div>
                                        <div class="scrollable">
                                            <table class="table table-sm table-striped" id="memberchargelist">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Description</th>
                                                    <th>Amount</th>
                                                    <th>Repaid</th>
                                                    <th>Balance</th>
                                                    <th>Date Created</th>
                                                    <th>Created By</th>
                                                    <th>&nbsp;</th><!-- Edit -->
                                                    <th>&nbsp;</th><!-- Delete -->
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>

                                        <div class="buttons">
                                            <button class="btn btn-sm btn-danger" id="deletemembercharge"><i class="fal fa-trash-alt fa-fw fa-lg"></i> Delete Charge</button>
                                            <button class="btn btn-sm btn-success" id="addnewmembercharge"><i class="fal fa-plus-circle fa-fw fa-lg"></i> Add Charge</button>
                                        </div>
                                    </div>
                                    <!-- End of member charges tab  -->

                                    <!-- Member Loan tab  -->
                                    <div class="tab-pane fade" id="memberloans" role="tabpanel" aria-labelledby="pop2-tab">
                                        <div class="pt-3"></div>
                                        <div id="loanlistnotification"></div>
                                        <div class="scrollable">
                                            <table class="table table-sm table-striped" id="memberloanslist">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Loan #</th>
                                                    <th>Application Date</th>
                                                    <th>Loan Type</th>
                                                    <th>Amount Applied</th>
                                                    <th>Status</th>
                                                    <th>Repaid</th>
                                                    <th>Balance</th>
                                                    <th>&nbsp;</th><!--Edit -->
                                                    <th>&nbsp;</th><!--Cancel -->
                                                    <!-- <th>&nbsp;</th>Delete -->
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>

                                        <div class="buttons">
                                            <button class="btn btn-sm btn-danger" id="cancelloan"><i class="fal fa-trash-alt fa-fw fa-lg"></i> Cancel</button>
                                            <button class="btn btn-sm btn-success" id="addnewloan"><i class="fal fa-plus-circle fa-fw fa-lg"></i> Add Loan</button>
                                        </div>
                                    </div>
                                    <!-- End of member loan tab  -->

                                    <!-- Member Notes tab  -->
                                    <div class="tab-pane fade" id="notes" role="tabpanel" aria-labelledby="pop2-tab">
                                        <div class="pt-3"></div>
                                        <div class="scrollable">
                                            <table class="table table-sm" id="membernotes">
                                                <thead>
                                                    <th><input type="checkbox" name="" id="selectallnotes"></th>
                                                    <th>#</th>
                                                    <th>Date Added</th>
                                                    <th>Category</th>
                                                    <th>Narration</th>
                                                    <th>Followup</th>
                                                    <th>Followup Date</th>
                                                    <th>Assigned</th>
                                                    <th>Added By</th>
                                                    <th>&nbsp;</th><!-- Edit -->
                                                    <th>&nbsp;</th><!-- Delete -->
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>

                                        <div class="buttons">
                                            <button class="btn btn-sm btn-danger" id="deletenote"><i class="fal fa-trash-alt fa-fw fa-lg"></i> Delete</button>
                                            <button class="btn btn-sm btn-success" id="addnewnote"><i class="fal fa-plus-circle fa-fw fa-lg"></i> Add Note</button>
                                        </div>
                                    </div>
                                    <!-- End of member notes tab  -->

                                    <!-- Member documents tab  -->
                                    <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="pop2-tab">
                                        <div class="pt-3"></div>
                                        <div class="scrollable">
                                            <table class="table table-sm table-striped" id="memberdocumentslist">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Document Name</th>
                                                    <th>Image</th>
                                                    <!-- <th>Description</th> -->
                                                    <th>Date Added</th>
                                                    <th>Added By</th>
                                                    <th>&nbsp;</th><!-- Edit -->
                                                    <th>&nbsp;</th><!-- Delete -->
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>

                                        <div class="buttons">
                                            <button class="btn btn-sm btn-danger" id="deletedocument"><i class="fal fa-trash-alt fa-fw fa-lg"></i> Delete</button>
                                            <button class="btn btn-sm btn-success" id="addnewdocument"><i class="fal fa-plus-circle fa-fw fa-lg"></i> Add Document</button>
                                        </div>
                                    </div>
                                    <!-- End of member documents tab  -->

                                    <!-- Member withdrawal tab  -->
                                    <div class="tab-pane fade" id="withdrawal" role="tabpanel" aria-labelledby="pop2-tab">
                                        <div class="pt-3"></div>
                                        <ul class="progress-indicator custom-complex">
                                            <li id="withdrawalloanstab" class="completed"> <span class="bubble"></span> Outstanding Loans </li>
                                            <li id="withdrawalsharestab"> <span class="bubble"></span> Shares </li>
                                            <li id="withdrawalguarantorstab"> <span class="bubble"></span> Guarantees </li>
                                            <li id="withdrawalmemberduestab"> <span class="bubble"></span> Member Dues </li>
                                        </ul>

                                        <div id="withdrawalloandetailsdiv">
                                            <table class="table table-sm table" id="memberoffsetloans">
                                                <thead>
                                                    <th><input type="checkbox" name="selectalloffsetloans" id="seleatalloffsetloans"></th>
                                                    <th>Loan #</th>
                                                    <th>Loan Name</th>
                                                    <th class='text-right'>Principal Balance</th>
                                                    <th class='text-right'>Outstanding Interest</th>
                                                    <th class='text-right'>Outstanding Penalty</th>
                                                    <th class='text-right'>Interest Charged</th>
                                                    <th class='text-right'>Total Loan</th>
                                                </thead>
                                                <tbody></tbody>
                                            </table>

                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="offsetfrom">Offset From</label>
                                                    <select name="offsetfrom" id="offsetfrom" class="form-control form-control-sm">
                                                        <option value="">&lt;Choose&gt;</option>
                                                        <option value="deposits">Deposits</option>
                                                    </select>
                                                </div>

                                                <div class="col form-group">
                                                    <label for="offsetdeposits">Total Deposits</label>
                                                    <input type="text" name="offsetdeposits" id="offsetdeposits" class="form-control form-control-sm font-weight-bold" disabled>
                                                </div>

                                                <div class="col col-md-2 form-group">
                                                    <label for="offsetinterestrate">Interest Rate</label>
                                                    <input type="number" name="offsetinterestrate" id="offsetinterestrate" class="form-control form-control-sm">
                                                </div>

                                                <div class="col form-group">
                                                    <label for="offsetinterestfomular">Interest Formular</label>
                                                    <select name="offsetinterestfomular" id="offsetinterestfomular" class="form-control form-control-sm">
                                                        <option value="">&lt;Choose&gt;</option>
                                                    </select>
                                                </div>

                                                <div class="col form-group">
                                                    <label for="totaloffset">Total Offset</label>
                                                    <div class="input-group">
                                                        <input type="number" name="totaloffset" id="totaloffset" class="form-control form-control-sm font-weight-bold" disabled>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-sm btn-danger" id="offsetloan">Offset Loan</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        <div id="withdrawalsharesdiv" display="none">
                                            <div class="card containergroup">
                                                <div class="card-header">
                                                    <h5>Current Member Shares</h5>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-sm table-striped" id="withdrawalmembershares">
                                                        <thead>
                                                            <th>#</th>
                                                            <th>Share Type</th>
                                                            <th>Amount</th>
                                                            <th>Transferred</th>
                                                            <th>Balance</th>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- <div class="card containergroup mt-2">
                                                <div class="card-header">
                                                    <h5>Share Transfer Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    
                                                </div>
                                            </div> -->

                                            <div class="card containergroup mt-2 mb-2">
                                                <div class="card-header">
                                                    <h5>Share Transfer Details</h5>
                                                </div>
                                                <div class="card-body">

                                                    <div id="sharetransfernotifications"></div>

                                                    <div class="row">
                                                        <div class="col form-group">
                                                            <label for="withdrawalsharetype">Share Type</label>
                                                            <select name="withdrawalsharetype" id="withdrawalsharetype" class="form-control form-control-sm"></select>
                                                        </div>

                                                        <div class="col form-group">
                                                            <label for="withdrawalsharetransfermember">Member number</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control form-control-sm" id="withdrawalsharetransfermember" name="withdrawalsharetransfermember" data-id="">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm btn-secondary" id="searchwithdrawalsharetransfermember"><i class="fal fa-search fa-lg fa-fw"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col form-group">
                                                            <label for="withdrawaltansfermembernames">Names</label>
                                                            <input type="text" name="withdrawaltansfermembernames" id="withdrawaltansfermembernames" class="form-control form-control-sm" disabled>
                                                        </div>

                                                        <div class="col form-group">
                                                            <label for="withdrawalsharestransferred">Shares Transferred</label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control form-control-sm" id="withdrawalsharestransferred" name="withdrawalsharetransfermember">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm btn-secondary" id="addwithdrawalsharestransferred"><i class="fal fa-plus fa-lg fa-fw"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <table class="table table-sm table-striped" id="transferredshareslist">
                                                        <thead>
                                                            <th>#</th>
                                                            <th>Member #</th>
                                                            <th>Names</th>
                                                            <th>Share Type</th>
                                                            <th>Amount Transferred</th>
                                                            <th>&nbsp;</th><!-- Edit -->
                                                            <th>&nbsp;</th><!-- Remove / Delete -->
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>

                                                    <!-- Save shares transfer button -->
                                                    <div class="d-flex justify-content-end">
                                                        <button class="btn btn-success btn-sm mb-2" id="transfershares"><i class="fal fa-save fa-lg fa-fw"></i> Transfer Shares</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="withdrawalguarantorsdiv" display="none">
                                            <div class="card containergroup">
                                                <div class="card-header">
                                                    <h5>Guaranteed Loans</h5>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-sm table-striped">
                                                        <thead>
                                                            <th>#</th>
                                                            <th>Loan Type</th>
                                                            <th>Loan Name</th>
                                                            <th>Member No</th>
                                                            <th>Member Name</th>
                                                            <!-- <th>Loan date</th> -->
                                                            <!-- <th>Loan Amount</th> -->
                                                            <th>Repaid</th>
                                                            <th>Balance</th>
                                                            <th>Guaranteed</th>
                                                            <th>Guarantee Balance</th>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card containergroup mt-3 mb-3">
                                                <div class="card-header">
                                                    <h5>Guarantee Transfer Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col form-group">
                                                            <label for="guaranteedloanno">Loan Number</label>
                                                            <select name="guaranteedloanno" id="guaranteedloanno" class="form-control form-control-sm">
                                                                <option value="">&lt;Choose&gt;</option>
                                                            </select>
                                                        </div>
                                                        <div class="col form-group">
                                                            <label for="gauaranteetransferto">Transfer To</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control form-control-sm" placeholder="Member number" id="gauaranteetransferto">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm btn-secondary" id="searchtransferguarantor"><i class="fal fa-search fa-lg fa-fw"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col form-group">
                                                            <label for="guarantortransfermembername">Member Names</label>
                                                            <input type="text" name="guarantortransfermembername" id="guarantortransfermembername" class="form-control form-control-sm" disabled>
                                                        </div>

                                                        <div class="col form-group">
                                                            <label for="guaranteetransferred">Amount Transferred</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control form-control-sm" id="guaranteetransferred">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm btn-secondary" id="addtransferredguarantee"><i class="fal fa-plus fa-lg fa-fw"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <table class="table table-sm table-striped">
                                                        <thead>
                                                            <th>#</th>
                                                            <th>Loan Type</th>
                                                            <th>Loan Number</th>
                                                            <th>Member Number</th>
                                                            <th>Names</th>
                                                            <th>Guaranteed Amount</th>
                                                            <th>&nbsp;</th><!-- Edit -->
                                                            <th>&nbsp;</th><!-- Delete -->
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                    <!-- Save Button  -->
                                                    <div class="d-flex justify-content-end">
                                                        <button class="btn btn-success btn-sm mb-2" id="transferguarantors"><i class="fal fa-save fa-lg fa-fw"></i> Transfer Guarantors</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="withdrawalmemberduesdiv" display="none">
                                            <div class="card containergroup mb-3">
                                                <div class="card-header ">
                                                    <h5>Members Refundable Dues</h5>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-sm table-striped">
                                                        <thead>
                                                            <th>#</th>
                                                            <th>Description</th>
                                                            <th>Balance</th>
                                                            <th>Refund</th>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>

                                                    <div class="row">
                                                        <div class="col col-md-3 form-group">
                                                            <label for="refundpaymentmode">Payment Mode</label>
                                                            <select name="refundpaymentmode" id="refundpaymentmode" class="form-control form-control-sm"></select>
                                                        </div>

                                                        <div class="col col-md-2 form-group">
                                                            <label for="refundreferenceno">Reference No</label>
                                                            <input type="text" name="refundreferenceno" id="refundreferenceno" class="form-control form-control-sm">
                                                        </div>

                                                        <div class="col col-md-2 form-group">
                                                            <label for="refundamount">Refund Amount</label>
                                                            <input type="text" name="refundamount" id="refundamount" class="form-control form-control-sm" disabled>
                                                        </div>

                                                        <div class="col form-group">
                                                            <label for="refundnarration">Narration</label>

                                                            <div class="input-group">
                                                                <input type="text" name="refundnarration" id="refundnarration" class="form-control form-control-sm">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm btn-success d-block" id="saverefund"><i class="fal fa-save fa-lg fa-fw"></i> Save Refund</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-sm btn-success" id="withdrawalprevious"><i class="fas fa-chevron-left fa-lg fa-fw" display="none"></i> Back</button>
                                        <button class="btn btn-sm btn-success" id="withdrawalnext">Next <i class="fas fa-chevron-right fa-lg fa-fw"></i></button>

                                    </div>
                                    <!-- End of member withdrawal tab  -->

                                    <!-- Member schedules tab  -->
                                    <div class="tab-pane fade" id="schedules" role="tabpanel" aria-labelledby="pop2-tab">
                                        <div class="pt-3"></div>
                                        <div id="schedulenotifications"></div>
                                        <div class="scrollable">
                                            <table class="table table-sm" id="memberschedules">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Category</th>
                                                    <th>Description</th>
                                                    <th>Starts</th>
                                                    <th>Ends</th>
                                                    <th>Amount</th>
                                                    <th>Date Added</th>
                                                    <th>Added By</th>
                                                    <th>&nbsp;</th><!-- Edit -->
                                                    <th>&nbsp;</th><!-- Delete -->
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>

                                        <div class="buttons">
                                            <button class="btn btn-sm btn-danger" id="deleteschedule"><i class="fal fa-trash-alt fa-fw fa-lg"></i> Delete</button>
                                            <button class="btn btn-sm btn-success" id="addnewschedule"><i class="fal fa-plus-circle fa-fw fa-lg"></i> Add Schedule</button>
                                        </div>
                                    </div>
                                    <!-- End of member schedule tab  -->

                                    <!-- Member Products tab  -->
                                    <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="pop2-tab">
                                        <div class="pt-3"></div>
                                        <div id="memberproductmainnotification"></div>
                                        <div class="scrollable">
                                            <table class="table table-sm" id="memberproductslist">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Unit of Measure</th>
                                                    <th>Date Added</th>
                                                    <th>Added By</th>
                                                    <th>&nbsp;</th><!-- Delete -->
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>

                                        <div class="buttons">
                                            <button class="btn btn-sm btn-success" id="addnewproduct"><i class="fal fa-plus-circle fa-fw fa-lg"></i> Add Product</button>
                                        </div>
                                    </div>
                                    <!-- End of Member products tab  -->

                                    <!-- Member Product Deliveries tab  -->
                                    <div class="tab-pane fade" id="deliveries" role="tabpanel" aria-labelledby="pop2-tab">
                                        <div class="pt-3"></div>
                                        <div class="scrollable">
                                            <table class="table table-sm" id="memberdeliveries">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Delivery Date</th>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Unit of Measure</th>
                                                    <th>Unit Price</th>
                                                    <th>Total</th>
                                                    <th>Added By</th>
                                                    <th>Status</th>
                                                    <th>&nbsp;</th><!-- Edit -->
                                                    <th>&nbsp;</th><!-- Delete -->
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- End of Template -->

    <!-- Modal for adding member loan  -->
    <div class="modal" tabindex="-1" role="dialog" id="loanapplicationmodal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Loan Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="loanid" id="loanid" value="0">

                    <ul class="progress-indicator custom-complex">
                        <li id="loandetails" class="completed"> <span class="bubble"></span> Loan Info </li>
                        <li id="guarantors"> <span class="bubble"></span> Guarantors </li>
                        <li id="collateral"> <span class="bubble"></span> Collateral </li>
                        <li id="loancharges"> <span class="bubble"></span> Charges </li>
                    </ul>

                    <div class="memberdetails">
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="loanapplicationmemberdetails">Applicant</label>
                                    <input type="text" name="loanapplicationmemberdetails" id="loanapplicationmemberdetails" class="form-control form-control-sm" data-memberid="" data-memberid="" data-freedeposits="0">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="loanapplicationshares">Deposits</label>
                                    <input type="text" name="loanapplicationshares" id="loanapplicationshares" class="form-control form-control-sm" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="loanapplicationmaxloanamount">Max Loan Amount</label>
                                    <input type="text" name="loanapplicationmaxamount" id="loanapplicationmaxamount" class="form-control form-control-sm" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="loaninfo" class="mt-3">
                        <div id="loannotifications"></div>
                        <div class="row">
                            <div class="col" style="display:none">
                                <div class="from-group">
                                    <label for="loanno">Loan Number</label>
                                    <input type="text" name="loanno" id="loanno" class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col form-group">
                                <label for="loanpaymentmethod">Preferred Payment Method</label>
                                <select name="loanpaymentmethod" id="loanpaymentmethod" class="form-control form-control-sm"></select>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="loantype">Loan Type</label>
                                    <select name="loantype" id="loantype" class="form-control form-control-sm"></select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="from-group">
                                    <label for="loanamount">Loan Amount</label>
                                    <input type="number" name="loanamount" id="loanamount" class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="repayperiod">Repay Period</label>
                                    <input type="number" name="repayperiod" id="repayperiod" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="purpose">Purpose</label>
                                    <select name="purpose" id="purpose" class="form-control form-control-sm"></select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="narration">Narration</label>
                                    <input type="text" name="narration" id="narration" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="from-group">
                                    <label for="repaymentcycle">Repayment Cycle</label>
                                    <select name="repaymentcycle" id="repaymentcycle" class="form-control form-control-sm">
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="insuredby">Insured By</label>
                                    <select name="insuredby" id="insuredby" class="form-control form-control-sm"></select>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="witnessno">Witness:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" id="witnessno" placeholder="Member number" aria-label="Witness member #" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="btn btn-sm btn-secondary" id="searchwitness"> <i class="fal fa-search fa-fw fa-lg"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="witnessname">Witness Name</label>
                                    <input type="text" name="witnessname" id="witnessname" class="form-control form-control-sm" data-id="" disabled>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Guarantors Tab  -->
                    <div id="loanguarantors">
                        <div id="guarantornotifications"></div>
                        <div class="form-group">
                            <label for="guarantor">Guarantor:</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Member number" aria-label="Witness member #" aria-describedby="basic-addon2" id="guarantorid" data-id="" data-memberno="">
                                <div class="input-group-append">
                                    <span class="btn btn-sm btn-secondary" id="searchguarantor"> <i class="fal fa-search fa-fw fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="gurantortotalshares">Total Deposits</label>
                                    <input type="number" name="guarantortotalshares" id="guarantortotalshares" class="form-control form-control-sm" disabled>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="guarantoravailableshares">Available Deposits</label>
                                    <input type="number" name="guarantoravailableshares" id="guarantoravailableshares" class="form-control form-control-sm" disabled>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="guarantor">Guaranteed</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" aria-describedby="basic-addon2" id="guaranteedshares">
                                        <div class="input-group-append">
                                            <span class="btn btn-sm btn-secondary" id="addguaranteedshares"> <i class="fal fa-plus fa-fw fa-lg"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-sm table-striped" id="guarantorslist">
                            <thead>
                                <th>#</th>
                                <th>Member #</th>
                                <th>Names</th>
                                <th>Guaranteed</th>
                                <th>&nbsp;</th><!-- Edit -->
                                <th>&nbsp;</th><!-- Remove -->
                            </thead>
                            <tbody></tbody>
                        </table>

                        <div class="row">

                            <div class="col">
                                <p class="alert alert-success p-2">Loan <span id="guaranteedloan" class="font-weight-bold">0.00</span> </p>
                            </div>

                            <div class="col">
                                <p class="alert alert-primary p-2">Secured <span id="guaranteedamount" class="font-weight-bold">0.00</span> </p>
                            </div>
                            <div class="col">
                                <p class="alert alert-danger p-2">Balance <span id="guaranteedbalance" class="font-weight-bold">0.00</span> </p>
                            </div>

                        </div>
                    </div>

                    <!-- Collateral Tab  -->
                    <div id="collateraldetails">
                        <div id="collateralnotifications"></div>
                        <div class="form-group">
                            <label for="collateraldescription">Description</label>
                            <input type="text" name="collateraldescription" id="collateraldescription" class="form-control form-control-sm">
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="collateralrefe">Reference No</label>
                                    <input type="text" name="collateralref" id="collateralref" class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="collateralvalue">Value</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" aria-describedby="basic-addon2" id="collateralvalue">
                                        <div class="input-group-append">
                                            <span class="btn btn-sm btn-secondary" id="addcollateral"> <i class="fal fa-plus fa-fw fa-lg"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-sm table-striped" id="collaterallist">
                            <thead>
                                <th>#</th>
                                <th>Reference #</th>
                                <th>Description</th>
                                <th>Value</th>
                                <th>&nbsp;</th><!-- Edit -->
                                <th>&nbsp;</th><!-- delete -->
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    <div id="loanchargedetails">
                        <div id="loanchargenotifications"></div>
                        <table class="table table-sm table-striped" id="loanchargeableitems">
                            <thead>
                                <th>#</th>
                                <th>Charge Description</th>
                                <th>Amount</th>
                                <th>&nbsp;</th><!-- Edit -->
                                <th>&nbsp;</th><!-- Delete -->
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">

                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal"><i class="fal fa-times fa-lg fa-fw"></i> Close</button>
                        </div>
                    </div>

                    <div class="col d-flex justify-content-end">
                        <button type="button" class="btn btn-success btn-sm mr-3" id="loanprevious"><i class="fal fa-angle-left fa-lg fa-fw"></i> Previous</button>
                        <button type="button" class="btn btn-success btn-sm" id="loannext">Next <i class="fal fa-angle-right fa-lg fa-fw"></i></button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Member charge details modal  -->
    <div class="modal" tabindex="-1" role="dialog" id="memberchargedetailsmodal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Charge Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="chargeid" id="chargeid" value="0">
                    <div id="memberchargenotifications"></div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="chargedescription">Charge Description</label>
                                <select name="chargedescription" id="chargedescription" class="form-control form-control-sm">
                                    <option value="">&lt;Choose&gt;</option>
                                </select>
                            </div>

                            <div class="col">
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="chargeamount">Amount Charged</label>
                                        <input type="number" name="chargeamount" id="chargeamount" class="form-control form-control-sm">
                                    </div>
                                    <div class="col form-group">
                                        <label for="chargerepaeats">Repeats</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" id="chargerepeats">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" value="Every month">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col">

                                <div class="form-group">
                                    <label for="">&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" class="check-control" id="applychargetoothermembers" name="applychargetoothermembers">
                                            </div>
                                        </div>

                                        <input type="text" id="" class="form-control form-control-sm" value="Apply to other members?">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">&nbsp;</label>
                                        <div class="check-group">
                                            <input type="checkbox" class="check-control" id="applychargetoothermembers" name="applychargetoothermembers">
                                            <label for="applychargetoothermembers" class="check-label">Apply to other members?</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="othermemberschargedcompany">Filter By Company</label>
                                        <select name="othermemberschargedcompany" id="othermemberschargedcompany" class="form-control form-control-sm"></select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="scrollablelist scrollablelist-small">
                            <table class='table table-sm table-borderless' id="memberstocharge">
                                <tbody></tbody>
                            </table>
                        </div>

                        <div class="row mt-0">
                            <div class="col col-md-3 form-group">
                                <label for="">&nbsp;</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" class="check-control" id="selectallmemberstocharge" name="selectallmemberstocharge">
                                        </div>
                                    </div>

                                    <input type="text" id="" class="form-control form-control-sm" value="Select All">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" id="savemembercharge"><i class="fal fa-save fa-lg fa-fw"></i> Save Charge</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="fal fa-times fa-fw fa-lg"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for adding member schedule  -->
        <div class="modal" tabindex="-1" role="dialog" id="memberscheduledetailsmodal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Schedule Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="scheduleid" id="scheduleid" value="0">
                        <div id="scheduledetailsnotifications"></div>
                        <div class="form-group">
                            <label for="schedulecategory">Schedule Category</label>
                            <select name="schedulecategory" id="schedulecategory" class="form-control form-control-sm">
                                <option value="">&lt;Choose&gt;</option>
                                <option value="shares">Shares</option>
                                <option value="deposits">Deposits</option>
                                <option value="savings">Savings</option>
                            </select>
                        </div>

                        <div id="schedulesharetypes" class="form-group" display="none">
                            <label for="schedulesharetypes">Share Type</label>
                            <select name="shedulesharetype" id="shedulesharetype" class="form-control form-control-sm">

                            </select>
                        </div>

                        <div id="schedulesavingtypes" class="form-group" display="none">
                            <label for="schedulesavingtype">Saving Type</label>
                            <select name="schedulesavingtype" id="schedulesavingtype" class="form-control form-control-sm"></select>
                        </div>

                        <div class="form-group">
                            <label for="schedulestartdate">Start Date</label>
                            <input type="text" name="schedulestartdate" id="schedulestartdate" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label for="scheduleenddate">End Date</label>
                            <input type="text" name="scheduleenddate" id="scheduleenddate" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label for="scheduleamount">Amount</label>
                            <input type="text" name="scheduleamount" id="scheduleamount" class="form-control form-control-sm">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" id="saveschedule"><i class="fal fa-save fa-lg fa-fw"></i> Save Schedule</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="clearcloseschedulemodal"><i class="fal fa-times fa-fw fa-lg"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Member notes  -->
        <div class="modal" tabindex="-1" role="dialog" id="notedetailsmodal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Notes details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="notesnotifications"></div>
                        <input type="hidden" name="noteid" id="noteid" value="0">
                        <div class="form-group">
                            <label for="notecategory">Category</label>
                            <select name="notecategory" id="notecategory" class="form-control form-control-sm"></select>
                        </div>
                        <div class="form-group">
                            <label for="notenarration">Narration</label>
                            <textarea name="" id="notenarration" class="form-control form-control-sm"></textarea>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="notefollowup">Follow up required?</label>
                                    <select name="notefollowup" id="notefollowup" class="form-control form-control-sm">
                                        <option value="">&lt;Choose&gt;</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="notefollowupdate">Follow up date</label>
                                    <input type="text" name="notefollowupdate" id="notefollwoupdate" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="noteassignedto">Assigned to</label>
                            <select name="noteassignedto" id="noteassignedto" class="form-control form-control-sm"></select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" id="savemembernote">Save Note</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Member attachments  -->
        <div class="modal" tabindex="-1" role="dialog" id="attachdocumentmodal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Attach Member Document ...</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="attachdocumenerrors"></div>
                        <input type="hidden" name="documentid" id="documentid" value="0">
                        <div class="form-group">
                            <label for="attacheddocumentname">Document Template</label>
                            <select name="attacheddocumentname" id="attacheddocumentname" class="form-control form-control-sm"></select>
                        </div>

                        <div class="form-group">
                            <label for="attacheddocument">Document</label>
                            <input type="file" name="attacheddocument" id="attacheddocument" class="form-control form-control-sm" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" id="savemeberdocument">Save changes</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Member Persons  -->
        <div class="modal" tabindex="-1" role="dialog" id="memberpersons">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Person Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="personnotifications"></div>
                        <input type="hidden" name="personid" id="personid" value="0">

                        <div class="row">

                            <div class="col form-group">
                                <label for="personcategorydiv">Category</label>
                                <select name="personcategory" id="personcategory" class="form-control form-control-sm">
                                    <option value="">&lt;Choose&gt;</option>
                                    <option value="beneficiary">Beneficiary</option>
                                    <option value="dependant">Dependant</option>
                                </select>
                            </div>

                            <div class="col">
                                <div id="personpercentagediv" class="display:none">
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="personpercentage">Share (Percentage)</label>
                                            <input type="number" name="personpercentage" id="personpercentage" class="form-control form-control-sm">
                                        </div>

                                        <div class="col form-group">
                                            <label for="personavailablepercentage">Available (Percentage)</label>
                                            <input type="text" name="personavailablepercentage" id="personavailablepercentage" class="form-control form-control-sm" disabled>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group" id="personstatusdiv" class="display:none">
                                    <label for="personstatus">Status</label>
                                    <select name="personstatus" id="personstatus" class="form-control form-control-sm">
                                        <option value="">&lt;Choose&gt;</option>
                                        <option value="available">Available</option>
                                        <option value="deceased">Deceased</option>
                                    </select>
                                </div>
                            </div> <!--  -->
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="personname">Full Name</label>
                                <input type="text" name="personname" id="personname" class="form-control form-control-sm">
                            </div>

                            <div class="col form-group">
                                <label for="personrelationship">Relationship</label>
                                <select name="personrelationship" id="personrelationship" class="form-control form-control-sm">
                                    <option value="">&lt;Choose&gt;</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="personmobile">Mobile #</label>
                                <!-- Option to copy member's mobile number  -->
                                <div class="input-group mb-3">
                                    <input type="number" name="personmobile" id="personmobile" class="form-control form-control-sm">
                                    <div class="input-group-append">
                                        <!-- <span class="tooltiptext">Copy member's mobile number</span> -->
                                        <button class="btn btn-sm btn-secondary " id="personcopymembermobile"><i class="fal fa-copy fa-lg fa-fw"></i></button>
                                    </div>
                                </div>

                            </div>

                            <div class="col form-group">
                                <label for="personemail">Email Address</label>
                                <!-- Option to copy member's email address  -->
                                <div class="input-group mb-3">
                                    <input type="email" name="personemail" id="personemail" class="form-control form-control-sm">
                                    <div class="input-group-append">
                                        <!-- <span class="tooltiptext">Copy members email number</span> -->
                                        <button class="btn btn-sm btn-secondary" id="personcopymemberemail"><i class="fal fa-copy fa-lg fa-fw"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="personiddocument">Identification Document</label>
                                <select name="personiddocument" id="personiddocument" class="form-control form-control-sm">
                                    <option value="">&lt;Choose&gt;</option>
                                </select>
                            </div>

                            <div class="col form-group">
                                <label for="personiddocumentno"><span id="iddocname">ID Document</span> Number</label>
                                <input type="text" name="personiddocumentno" id="personiddocumentno" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="personidexpirydate">ID Expiry Date</label>
                                <input type="text" name="personidexpirydate" id="personidexpirydate" class="date-control form-control form-control-sm">
                            </div>

                            <div class="col form-group">
                                <label for="personremindonidexpiry">Set Reminder</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" id="personremindonidexpiry" name="personremindonidexpiry">
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control form-control-sm" value="Remind on expiry">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" id="savemeberperson"> <i class="fal fa-save fa-lg fa-fw"></i> Save Person</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal"><i class="fal fa-times fa-lg fa-fw"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for importing members  -->
        <div class="modal" tabindex="-1" role="dialog" id="importmembersmodal">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Import Members</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="importembernotifications"></div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="importmembercompany">Company</label>
                                <select name="importmembercompany" id="importmembercompany" class="form-control form-control-sm"></select>
                            </div>

                            <div class="col form-group">
                                <label for="importmembernationality">Nationality</label>
                                <select name="importmembernationality" id="importmembernationality" class="form-control form-control-sm"></select>
                            </div>

                            <div class="col form-group">
                                <label for="importmemberregistrationdocument">Registration Document</label>
                                <select name="importmemberregistrationdocument" id="importmemberregistrationdocument" class="form-control form-control-sm"></select>
                            </div>

                            <div class="col form-group">
                                <label for="importmembercategory">Category</label>
                                <select name="importmembercategory" id="importmembercategory" class="form-control form-control-sm">
                                    <option value="">&lt;Choose&gt;</option>
                                    <option value="member">Member</option>
                                    <option value="nonmember">Non Member</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" id="importmembergeneratemembernumber" checked>
                                    </div>
                                </div>
                                <input type="text" class="form-control form-control-sm" value='Generate member numbers' disabled>
                            </div>

                            <div class="col input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" id="importmemberwelfaremember" checked>
                                    </div>
                                </div>
                                <input type="text" class="form-control form-control-sm" value='Welfare member' disabled>
                            </div>

                            <div class="col input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" id="importmemberchargeregistrationfee" checked>
                                    </div>
                                </div>
                                <input type="text" class="form-control form-control-sm" value='Charge registration fees' disabled>
                            </div>
                            <div class="col">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="importmemberselectimportfile">Select file with members</label>
                                <div class="input-group">
                                    <input type="file" class="form-control form-control-sm" id="importmemberselectimportfile">
                                    <!-- <div class="input-group-append">
                                    <span class="input-group-text"><i class="fal fa-paper-clip fa-lg fa-fw"></i></span>
                                </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="scrollable scrollabel-small">
                            <table class="table table-sm table-striped" id="importmemberslist">
                                <thead>
                                    <th>#</th>
                                    <th>member_number</th>
                                    <th>first_name</th>
                                    <th>middle_name</th>
                                    <th>other_names</th>
                                    <th>gender</th>
                                    <th>date_of_birth</th>
                                    <th>id_number</th>
                                    <th>mobile</th>
                                    <th>email</th>
                                    <th>payroll_number</th>
                                    <th>physical_address</th>
                                    <th>postal_address</th>
                                    <th>town</th>
                                    <th>postal_code</th>
                                    <th>nok_name</th>
                                    <th>nok_relationship</th>
                                    <th>nok_mobile</th>
                                    <th>nok_email</th>
                                    <th>monthly_deposits</th>
                                    <th>total_deposits</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" id="importmemberexporttemplate"><i class="fal fa-download fa-lg fa-fw"></i> Sample template</button>
                        <button type="button" class="btn btn-success btn-sm" id="importmembersavemembers"><i class="fal fa-save fa-lg fa-fw"></i> Save members</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="fal fa-times fa-lg fa-fw"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for importing member shares  -->
        <div class="modal" tabindex="-1" role="dialog" id="importsharesmodal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Shares import details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="importsharesnotifications"></div>
                        <div class="row">
                            <div class="col col-md-4 form-group">
                                <label for="importsharetype">Share Type:</label>
                                <select name="importsharetype" id="importsharetype" class="form-control form-control-sm"></select>
                            </div>

                            <div class="col form-group">
                                <label for="importsharesfile">Select File with shares data</label>
                                <input type="file" name="importsharesfile" id="importsharesfile" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="scrollable scrollable-big">
                            <table class="table table-sm table-striped" id="importmembershares">
                                <thead>
                                    <td>#</td>
                                    <td>Member Number</td>
                                    <td>Member Names</td>
                                    <td>Shares</td>
                                    <td>&nbsp;</td>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                        <table id="samplesharestemplate" class="table table-sm table-striped" style="display:none">
                            <thead>
                                <th>Member Number</th>
                                <th>Total Shares</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>APL0001</td>
                                    <td>5000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" id="importsharessampletemplate"><i class="fal fa-download fa-lg fa-fw"></i> Sample Template</button>
                        <button type="button" class="btn btn-success btn-sm" id="saveimportshares"><i class="fal fa-save fa-lg fa-fw"></i> Save Shares</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="fal fa-times fa-lg fa-fw"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for importing savings  -->
        <div class="modal" tabindex="-1" role="dialog" id="importsavingsmodal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Savings import details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="importsavingsnotifications"></div>
                        <div class="row">
                            <div class="col col-md-4 form-group">
                                <label for="importsavingstype">Savings Type:</label>
                                <select name="importsavingstype" id="importsavingstype" class="form-control form-control-sm"></select>
                            </div>

                            <div class="col form-group">
                                <label for="importsavingsfile">Select File with savings data</label>
                                <input type="file" name="importsavingsfile" id="importsavingsfile" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="scrollable scrollable-big">
                            <table class="table table-sm table-striped" id="importmembersavings">
                                <thead>
                                    <td>#</td>
                                    <td>Member Number</td>
                                    <td>Member Names</td>
                                    <td>Savings</td>
                                    <td>&nbsp;</td>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                        <table id="samplesavingstemplate" class="table table-sm table-striped" style="display:none">
                            <thead>
                                <th>Member Number</th>
                                <th>Total Savings</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>APL0001</td>
                                    <td>5000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" id="importsavingssampletemplate"><i class="fal fa-download fa-lg fa-fw"></i> Sample Template</button>
                        <button type="button" class="btn btn-success btn-sm" id="saveimportsavings"><i class="fal fa-save fa-lg fa-fw"></i> Save Shares</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="fal fa-times fa-lg fa-fw"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for savings refund  -->
        <div class="modal" tabindex="-1" role="dialog" id="membersavingsrefundmodal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Member Refund Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <nav class="nav-justified ">
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#individualrefund" role="tab" aria-controls="pop1" aria-selected="true">Individual</a>
                                <a class="nav-item nav-link" id="pop2-tab" data-toggle="tab" href="#grouprefund" role="tab" aria-controls="pop2" aria-selected="false">Group</a>
                            </div>
                        </nav>
                        <div class="tab-content text-left" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="individualrefund" role="tabpanel" aria-labelledby="pop1-tab">
                                <div class="pt-3"></div>
                                <div id="refundindividualnotifications"></div>
                                <div class="row">

                                    <div class="col form-group">
                                        <label for="refundmemberno">Member Number</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" id="refundmemberno" data-memberid="">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-secondary" id="searchrefundmemberno"><i class="fal fa-search fa-lg fa-fw"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col form-group">
                                        <label for="refundmembername">Member Name</label>
                                        <input type="text" name="refundmembername" id="refundmembername" class="form-control form-control-sm" disabled>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col form-group">
                                        <label for="refundsavingtype">Saving Type</label>
                                        <select name="refundsavingtype" id="refundsavingtype" class="form-control form-control-sm"></select>
                                    </div>

                                    <div class="col form-group">
                                        <label for="refundavailablebalance">Available Balance</label>
                                        <input type="number" name="refundavailablebalance" id="refundavailablebalance" class="form-control form-control-sm" disabled>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col form-group">
                                        <label for="refundpaymentmethod">Payment Method</label>
                                        <select name="refundpaymentmethod" id="refundpaymentmethod" class="form-control form-control-sm"></select>
                                    </div>
                                    <div class="col form-group">
                                        <label for="refundamountrefunded">Amount Refunded</label>
                                        <input type="number" name="refundamountrefunded" id="refundamountrefunded" class="form-control form-control-sm">
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col form-group">
                                        <label for="refundreferenceno">Reference Number</label>
                                        <input type="text" name="refundreferenceno" id="refundreferenceno" class="form-control form-control-sm">
                                    </div>

                                    <div class="col form-group">
                                        <label for="refundgeneratepaymentvoucher">Payment Voucher</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" id="refundgeneratepaymentvoucher">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" disabled value='Generate'>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="grouprefund" role="tabpanel" aria-labelledby="pop2-tab">
                                <div class="pt-3"></div>
                                <div id="refundgroupnotifications"></div>
                                <div class="row">

                                    <div class="col form-group">
                                        <label for="refundcompany">Company</label>
                                        <select name="refundcompany" id="refundcompany" class="form-control form-control-sm"></select>
                                    </div>

                                    <div class="col form-group">
                                        <label for="refundgroupsavingtype">Saving Type</label>
                                        <select name="refundgroupsavingtype" id="refundgroupsavingtype" class="form-control form-control-sm"></select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col">
                                        <label for="refundgrouppaymentmethod">Payment Method</label>
                                        <select name="refundgrouppaymentmethod" id="refundgrouppaymentmethod" class="form-control form-control-sm"></select>
                                    </div>

                                    <div class="form-group col">
                                        <label for="refundgroupreferenceno">Reference Number</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" id="refundgroupreferenceno">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-secondary" id="copygroupreferenceno"><i class="fal fa-copy fa-lg fa-fw"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="scrollable scrollable-small">
                                    <table class="table table-sm table-striped" id="grouprefundlist">
                                        <thead>
                                            <th>#</th>
                                            <th>Member Number</th>
                                            <th>Names</th>
                                            <th>Total Savings</th>
                                            <th>Refunded</th>
                                            <th>Reference #</th>
                                            <th>&nbsp;</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn  btn-sm btn-success" id="savememberrefund"><i class="fal fa-save fa-lg fa-fw"></i> Save Refund</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="fal fa-times fa-lg fa-fw"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal to filter members  -->
        <div class="modal" tabindex="-1" role="dialog" id="filtermembersmodal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Filter Members</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="filtermembernotifications"></div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="filtercompany">Company</label>
                                <select name="filtercompany" id="filtercompany" class="form-control form-control-sm"></select>
                            </div>

                            <div class="col form-group">
                                <label for="filternationality">Nationality</label>
                                <select name="filternationality" id="filternationality" class="form-control form-control-sm"></select>
                            </div>

                            <div class="col form-group">
                                <label for="filtergender">Gender</label>
                                <select name="filtergender" id="filtergender" class="form-control form-control-sm">
                                    <option value="">&lt;All&gt;</option>
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="filterwelfaremember">Welfare Member</label>
                                <select name="filterwelfaremember" id="filterwelfaremember" class="form-control form-control-sm">
                                    <option value="">&lt;All&gt;</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col form-group">
                                <label for="filterregdoc">Registration Document</label>
                                <select name="filterregdoc" id="filterregdoc" class="form-control form-control-sm"></select>
                            </div>
                            <div class="col form-group">
                                <label for="filterregdocno">Registration Doc Number</label>
                                <input type="text" name="filterregdocnumber" id="filterregdocnumber" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="filterstatus">Status</label>
                                <select name="filterstatus" id="filterstatus" class="form-control form-control-sm">
                                    <option value="">&lt;All&gt;</option>
                                    <option value="active">Active</option>
                                    <option value="withdrawn">Withdrawn</option>
                                </select>
                            </div>
                            <div class="col form-group">
                                <label for="filtermembernames">Member Name</label>
                                <input type="text" name="filtermembernames" id="filtermembernames" class="form-control form-control-sm">
                            </div>
                            <div class="col form-group">
                                <label for="filtermemberno">Member Number</label>
                                <input type="text" name="filtermemberno" id="filtermemberno" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="filterpayrollno">Payroll Number</label>
                                <input type="text" name="filterpayrollno" id="filterpayrollno" class="form-control form-control-sm">
                            </div>
                            <div class="col form-group">
                                <label for="filteremail">Email Address</label>
                                <input type="email" name="filteremail" id="filteremail" class="form-control form-control-sm">
                            </div>

                            <div class="col form-group">
                                <label for="filtermobile">Mobile Number</label>
                                <input type="text" name="filtermobilenumber" id="filtermobilenumber" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="filterallbirthdates">Date of Birth</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" id="filterallbirthdates">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" value='All Dates'>
                                </div>
                            </div>

                            <div class="col form-group">
                                <label for="filterdobstartdate">Start Date</label>
                                <input type="text" name="filterdobstartdate" id="filterdobstartdate" class="form-control form-control-sm datecontrol">
                            </div>

                            <div class="col form-group">
                                <label for="filterdobenddate">End Date</label>
                                <input type="text" name="filterdonenddate" id="filterdobenddate" class="form-control form-control-sm datecontrol">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-ggroup">
                                <label for="filterallregdates">Registration Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" id="filterallregdates">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" value='All Dates'>
                                </div>
                            </div>

                            <div class="col form-group">
                                <label for="filterregstartdate">Start Date</label>
                                <input type="text" name="filterregstartdate" id="filterregstartdate" class="form-control form-control-sm datecontrol">
                            </div>

                            <div class="col form-group">
                                <label for="filterregenddate">End Date</label>
                                <input type="text" name="filterdonenddate" id="filterregenddate" class="form-control form-control-sm datecontrol">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" id="getmembersbutton"><i class="fal fa-search fa-lg fa-fw"></i> Apply Filter</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="fal fa-times fa-lg fa-fw"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Member Products  -->
        <div class="modal" tabindex="-1" role="dialog" id="memberproductsmodal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Product Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="memberproductnotifications"></div>
                        <div class="card containergroup">
                            <div class="card-header">
                                <h5>Select Product(s)</h5>
                            </div>
                            <div class="card-body">
                                <div class="scrollablelist scrollablelist-tiny">
                                    <table class='table table-sm table-borderless' id="memberproductstable">
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card containergroup mt-3">
                            <div class="card-header">
                                <h5>Select Other Members to add ...</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="memberproductscompany">Select Members from</label>
                                    <select name="memberproductscompany" id="memberproductscompany" class="form-control form-control-sm"></select>
                                </div>
                                <div class="scrollablelist scrollable-extrasmall">
                                    <table class='table table-sm table-borderless' id="otherproductmemberstable">
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" class="check-control" id="selectallproductmembers" name="selectallproductmembers">
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control form-control-sm" value="Select All">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" id="savememberproducts"><i class="fal fa-save fa-lg fa-fw"></i> Save changes</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close <i class="fal fa-times fa-lg fa-fw"></i> </button>
                    </div>
                </div>
            </div>
        </div>
</body>


<script src="js/components.js"></script>


</html>