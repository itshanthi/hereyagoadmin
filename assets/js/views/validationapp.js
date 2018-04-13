       angular.module('myApp', [])
          .controller('AppController', [function() {
              var self = this;
              self.submit = function() {
                  console.log('Form is submitted with following user', self.user);
            };
      }]);