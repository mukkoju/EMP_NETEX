<div ng-controller="IndexController" class="bg d-flex justify-content-center align-items-center">
    <div class="login-box card">
        <div class="login-header">
            <i class="oi oi-account-login"></i>
            <h1>Login</h1>
        </div>
        <form name="loginForm" ng-submit="loginFromSubmit(loginForm.$valid)" novalidate>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" 
                       ng-model="username" ng-required="true" required>
                <div ng-messages="loginForm.username.$error">
                 <p ng-message="required" ng-show="loginForm.username.$error.required" class="help-block">Username is required.</p>
                </div> 
                </div>
            <div class="form-group">
                <label for="password">Password</label>
                
                <input type="password" class="form-control" id="password" ng-model="password" ng-required="true">
                <div ng-messages="loginForm.password.$error">  
                  <p ng-show="loginForm.password.$invalid" class="help-block">Password is required.</p>
                </div>  
                </div>
            <input type="submit" value="Submit" class="btn btn-primary" />
        </form>
    </div>
</div>