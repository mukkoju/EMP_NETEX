<div class="dialog" ng-controller="EmployeeController as ec">
    <button type="button" class="close" aria-label="Close" ng-click="cancle()">
        <span aria-hidden="true">&times;</span>
    </button>
    <h2 class="subhead">All Employees</h2>
    <table class="table table-striped">
        <tbody class="text-center">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
            </tr>
            <tr ng-repeat="emp in emps">
                <td>{{emp.id}}</td>
                <td>{{emp.name}}</td>
                <td>{{emp.email}}</td>
                <td>{{emp.mobile}}</td>
            </tr>
        </tbody>
    </table>
</div>