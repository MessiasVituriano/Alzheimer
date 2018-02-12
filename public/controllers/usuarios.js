app.controller('usuariosController', function($scope, $http) {
    
    $http.get("api/v1/usuarios")
            .then(function(response) {
                $scope.usuarios = response.data;
                console.log($scope.usuarios);
            }).catch(function (err) {});


    $scope.toggle = function(modalstate, id) {
        console.log('Function toggle, modalstate: '+modalstate+', id: '+id);
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Adicionar novo usuario";
                $scope.usuario = null;
                break;
            case 'edit':
                $scope.form_title = "Detalhes do usuario";
                $scope.id = id;
                $http.get('api/v1/usuarios/' + id)
                        .then(function(response) {
                            console.log(response);
                            $scope.usuario = response.data;
                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }


    $scope.save = function(modalstate, id) {
        var url = "api/v1/usuarios";
        
        // acrescenta na URL o id do usuario se o formulário estiver no modo de edição
        if (modalstate === 'edit'){
            url += "/" + id;
        }


        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.usuario),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}        
        }).then(function(response) {
            console.log(response);
            $('#myModal').modal('hide');
            location.reload();
        }).catch(function(response) {
            console.log(response);
            $('#myModal').modal('hide');
            alert('Erro. Verifique os logs no console.');
        });
    }



    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Deseja realmente excluir este registro?');
        if (isConfirmDelete) {
            $http({
                method: 'delete',
                url: 'api/v1/usuarios/' + id
            }).
                    then(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    catch(function(data) {
                        console.log(data);
                        alert('Erro ao excluir.');
                    });
        } else {
            return false;
        }
    }

});

