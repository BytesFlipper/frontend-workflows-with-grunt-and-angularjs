angular.module("app").run(function($rootScope, $location, AuthenticationService, FlashService) {
  var routesThatRequireAuth = [];

  $rootScope.$on('$routeChangeStart', function(event, next, current) {
    if(_(routesThatRequireAuth).contains($location.path()) && !AuthenticationService.isLoggedIn()) {
      $location.path('/login');
      FlashService.show("Please log in to continue.");
    }
  });
});
