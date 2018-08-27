<div ng-controller="Homecontroller as hc">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/home">Portal</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
            </ul>
            <div class="nav-item dropdown">
                <img src="">
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row ">
            <div class="col-sm">
                <div class="card text-center" ng-click="showEmp('A')">
                    <div class="card-body">
                        <i class="oi oi-plus"></i>
                    </div>
                    <div class="card-footer">
                        Add Employee
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card text-center" ng-click="allEmp()">
                    <div class="card-body">
                        <i class="oi oi-person"></i>
                    </div>
                    <div class="card-footer">
                        Manage Employee
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="oi oi-task"></i>
                    </div>
                    <div class="card-footer">
                        Assign Employee
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="oi oi-people"></i>
                    </div>
                    <div class="card-footer">
                        All Employees
                    </div>
                </div>    
            </div>
            <div class="col-sm">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="oi oi-comment-square"></i>
                    </div>
                    <div class="card-footer">
                        Submit Review
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>