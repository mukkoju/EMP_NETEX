<div class="dialog" ng-controller="EmployeeController as ec">
    <button type="button" class="close" aria-label="Close" ng-click="cancle()">
        <span aria-hidden="true">&times;</span>
    </button>
    <h2 class="subhead">{{emp.id ? emp.id : "New Employee"}}</h2>
    <form name="empform" ng-submit="saveEmp()" novalidate>
        <div class="form-group">
            <label for="id">Employee Id</label>
            <input type="text" class="form-control" id="id" name="id" ng-model="emp.id" required>
            <div ng-messages="submitted && empform.id.$error">
                <div ng-message="required" class="err" ng-show="empform.id && empform.id.$error.required">Enter employee Id.</div>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Employee Name</label>
            <input type="text" class="form-control" id="name" name="name" ng-model="emp.name" required>
            <div ng-messages="empform.name.$error">
                <div ng-message="required" class="err" ng-show="empform.$invalid && empform.name.$error.required">Enter employee name.</div>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Employee Email</label>
            <input type="email" class="form-control" id="email" name="email" ng-model="emp.email" ng-pattern="/^[a-zA-Z0-9_\+-]+(\.[a-zA-Z0-9_\+-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.([a-zA-Z]{2,4})$/" required>
            <div ng-messages="empform.$submitted && && empform.email.$error">
                <div ng-message="required" class="err" ng-show="empform.email && empform.email.$error.required">Enter email address.</div>
                <div ng-message="pattern" class="err" ng-show="empform.email.$invalid && empform.email.$error.pattern">Invalid Email.</div>
            </div>
        </div>
        <div class="form-group">
            <label for="mobile">Employee Mobile</label>
            <input type="text" class="form-control" id="mobile" name="mobile" ng-model="emp.mobile" required ng-pattern="/^\d{6,20}$/">
            <div ng-messages="submitted && empform.mobile.$error">
                <div ng-message="required" class="err" ng-show="empform.mobile && empform.mobile.$error.required">Enter your Phone number.</div>
                <div ng-message="pattern" class="err" ng-show="empform.mobile.$invalid && empform.mobile.$error.pattern">Invalid Phone Number.</div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>