<div class="dialog" ng-controller="EmployeeController as ec">
    <button type="button" class="close" aria-label="Close" ng-click="cancle()">
        <span aria-hidden="true">&times;</span>
    </button>
    <h2 class="subhead">Manage Employees</h2>
    <table class="table table-striped">
        <tbody class="text-center">
            <tr>
                <th scope="col">Employee</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            <tr ng-repeat="emp in emps">
                <td>{{emp.name}}</td>
                <td ng-click="showEmp('E', emp.id)"><a href="#"><i class="oi oi-pencil"></i></a></td>
                <td ng-click="deleteEmp(emp.id)"><a href="#"><i class="oi oi-trash"></i></a></td>
            </tr>
        </tbody>
    </table>
</div>