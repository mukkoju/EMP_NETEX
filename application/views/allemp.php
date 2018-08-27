<div class="dialog">
    <h2 class="subhead">Employee</h2>
    <table class="table table-striped table-dark">
        <tbody>
            <tr>
                <th scope="col">Employee</th>
                <th scope="col">Manage</th>
            </tr>
            <tr ng-repeat="emp in emps">
                <td>Sathish Kumar Mukkoju</td>
                <td class="text-center" ng-click="showEmp('E', emp.id)"><a href="#"><i class="oi oi-pencil"></i></a></td>
            </tr>
        </tbody>
    </table>
</div>