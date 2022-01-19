@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-2">
                <div class="card-header text-center">{{ __('Indonesia') }}</div>

                <div class="card-body row p-3">
                    <div class="col-md-6">
                        <div class="alert alert-dark text-center p-1">
                            <h3 class="m-0" id="indonesiPositif">0</h3>
                            <h6 class="m-0">Positif</h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-dark text-center p-1">
                            <h3 class="m-0" id="indonesiSembuh">0</h3>
                            <h6 class="m-0">Sembuh</h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-dark text-center p-1">
                            <h3 class="m-0" id="indonesiMeninggal">0</h3>
                            <h6 class="m-0">Meninggal</h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-dark text-center p-1">
                            <h3 class="m-0" id="indonesiDirawat">0</h3>
                            <h6 class="m-0">Dirawat</h6>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a type="button" class="col-12 btn btn-sm btn-secondary" onclick="modalIndonesia()">
                            Show All
                        </a>
                    </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header text-center">{{ __('Dunia') }}</div>

                <div class="card-body row p-3">
                    <div class="col-md-6">
                        <div class="alert alert-dark text-center p-1">
                            <h3 class="m-0" id="globalPositif">0</h3>
                            <h6 class="m-0">Positif</h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-dark text-center p-1">
                            <h3 class="m-0" id="globalSembuh">0</h3>
                            <h6 class="m-0">Sembuh</h6>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="alert alert-dark text-center p-1">
                                    <h3 class="m-0" id="globalMeninggal">0</h3>
                                    <h6 class="m-0">Meninggal</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a type="button" class="col-12 btn btn-sm btn-secondary" onclick="modalDunia()">
                            Show All
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a type="button" class="col-12 btn btn-sm btn-secondary" onclick="modalTask(0)">
                        Add Task
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalIndonesia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Covid-19 Indonesia</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal"></a>
            </div>
            <div class="modal-body pb-0" id="rowProvinces">

            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalProvinsi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="provinsiTitle"></h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal"></a>
            </div>
            <div class="modal-body pb-0">
                <div class="row">
                    <div class="col-md-4">
                        <div class="alert alert-dark text-center p-1">
                            <h3 class="m-0" id="provinsiPositif">0</h3>
                            <h6 class="m-0">Positif</h6>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="alert alert-dark text-center p-1">
                            <h3 class="m-0" id="provinsiSembuh">0</h3>
                            <h6 class="m-0">Sembuh</h6>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="alert alert-dark text-center p-1">
                            <h3 class="m-0" id="provinsiMeninggal">0</h3>
                            <h6 class="m-0">Meninggal</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDunia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Covid-19 Dunia</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal"></a>
            </div>
            <div class="modal-body" id="rowNations">

            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Task</h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal"></a>
            </div>
            <div class="modal-body">
                <div id="rowUsers">

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a type="button" class="col-12 btn btn-sm btn-secondary" onclick="addTask()">
                            Add Task
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.onload = function() {
        axios.post('http://localhost/kawalcorona/public/api/sign_in', {
            username: 'admin',
            password: '12345'
        }).then(function (response) {
            localStorage.setItem('dataLogin', JSON.stringify(response.data));

            axios.get('http://localhost/kawalcorona/public/api/data_indonesi', { 
                headers: {
                    'Authorization' : 'Bearer ' + response.data.data.token
                }
            }).then(function (response) {
                document.getElementById('indonesiPositif').textContent = response.data.data.positif;
                document.getElementById('indonesiSembuh').textContent = response.data.data.sembuh;
                document.getElementById('indonesiMeninggal').textContent = response.data.data.meninggal;
                document.getElementById('indonesiDirawat').textContent = response.data.data.dirawat;
            }).catch(function (error) {
                let icon = '';

                if (error.response.data.code == 422) {
                    icon = 'warning';
                } else {
                    icon = 'error';
                }

                Swal.fire({
                    icon: icon,
                    title: 'Oops...',
                    text: error.response.data.message,
                    allowOutsideClick: false,
                });

                axios.get('http://localhost/kawalcorona/public/api/data_indonesi_empty', { 
                    headers: {
                        'Authorization' : 'Bearer ' + response.data.data.token
                    }
                })
                .then(function (response) {
                    document.getElementById('indonesiPositif').textContent = response.data.data.positif;
                    document.getElementById('indonesiSembuh').textContent = response.data.data.sembuh;
                    document.getElementById('indonesiMeninggal').textContent = response.data.data.meninggal;
                    document.getElementById('indonesiDirawat').textContent = response.data.data.dirawat;
                })
                .catch(function (error) {
                    let icon = '';

                    if (error.response.data.code == 422) {
                        icon = 'warning';
                    } else {
                        icon = 'error';
                    }

                    Swal.fire({
                        icon: icon,
                        title: 'Oops...',
                        text: error.response.data.message,
                        allowOutsideClick: false,
                    });
                });
            });

            axios.get('http://localhost/kawalcorona/public/api/data_global', { 
                headers: {
                    'Authorization' : 'Bearer ' + response.data.data.token
                }
            }).then(function (response) {
                document.getElementById('globalPositif').textContent = response.data.data.sum_confirmed;
                document.getElementById('globalSembuh').textContent = response.data.data.sum_recovery;
                document.getElementById('globalMeninggal').textContent = response.data.data.sum_death;
            }).catch(function (error) {
                let icon = '';

                if (error.response.data.code == 422) {
                    icon = 'warning';
                } else {
                    icon = 'error';
                }

                Swal.fire({
                    icon: icon,
                    title: 'Oops...',
                    text: error.response.data.message,
                    allowOutsideClick: false,
                });

                axios.get('http://localhost/kawalcorona/public/api/data_global_empty', { 
                    headers: {
                        'Authorization' : 'Bearer ' + response.data.data.token
                    }
                }).then(function (response) {
                    document.getElementById('globalPositif').textContent = response.data.data.sum_confirmed;
                    document.getElementById('globalSembuh').textContent = response.data.data.sum_recovery;
                    document.getElementById('globalMeninggal').textContent = response.data.data.sum_death;
                }).catch(function (error) {
                    let icon = '';

                    if (error.response.data.code == 422) {
                        icon = 'warning';
                    } else {
                        icon = 'error';
                    }

                    Swal.fire({
                        icon: icon,
                        title: 'Oops...',
                        text: error.response.data.message,
                        allowOutsideClick: false,
                    });
                });
            });
        }).catch(function (error) {
            let icon = '';

            if (error.response.data.code == 422) {
                icon = 'warning';
            } else {
                icon = 'error';
            }

            Swal.fire({
                icon: icon,
                title: 'Oops...',
                text: error.response.data.message,
                allowOutsideClick: false,
            });
        });
    }

    var mymodalIndonesia = new bootstrap.Modal(document.getElementById('modalIndonesia'), {
        keyboard: false
    });

    var mymodalProvinsi = new bootstrap.Modal(document.getElementById('modalProvinsi'), {
        keyboard: false
    });

    var mymodalDunia = new bootstrap.Modal(document.getElementById('modalDunia'), {
        keyboard: false
    });

    var mymodalTask = new bootstrap.Modal(document.getElementById('modalTask'), {
        keyboard: false
    });

    var dataProvinces = [];

    function modalIndonesia() {
        dataProvinces = [];

        const dataLogin = JSON.parse(localStorage.getItem('dataLogin'));

        axios.get('http://localhost/kawalcorona/public/api/data_provinces', { 
            headers: {
                'Authorization' : 'Bearer ' + dataLogin.data.token
            }
        }).then(function (response) {
            dataProvinces = response.data;

            let html = '';
            let i = 0;

            response.data.data.forEach(val => {
                html += '<a type="button" class="col-12 btn btn-sm btn-secondary mb-3" onclick="modalProvinsi(' + "'" + i++ + "'" + ')">';
                html += val.attributes.Provinsi
                html += '</a>';
            });

            document.getElementById('rowProvinces').innerHTML = html;

            mymodalIndonesia.show();
        }).catch(function (error) {
            let icon = '';

            if (error.response.data.code == 422) {
                icon = 'warning';
            } else {
                icon = 'error';
            }

            Swal.fire({
                icon: icon,
                title: 'Oops...',
                text: error.response.data.message,
                allowOutsideClick: false,
            });

            axios.get('http://localhost/kawalcorona/public/api/data_provinces_empty', { 
                headers: {
                    'Authorization' : 'Bearer ' + dataLogin.data.token
                }
            }).then(function (response) {
                dataProvinces = response.data;

                let html = '';
                let i = 0;

                response.data.data.forEach(val => {
                    html += '<a type="button" class="col-12 btn btn-sm btn-secondary mb-3" onclick="modalProvinsi(' + "'" + i++ + "'" + ')">';
                    html += val.attributes.Provinsi
                    html += '</a>';
                });

                document.getElementById('rowProvinces').innerHTML = html;

                mymodalIndonesia.show();
            }).catch(function (error) {
                let icon = '';

                if (error.response.data.code == 422) {
                    icon = 'warning';
                } else {
                    icon = 'error';
                }

                Swal.fire({
                    icon: icon,
                    title: 'Oops...',
                    text: error.response.data.message,
                    allowOutsideClick: false,
                })
            });
        });
    }

    function modalProvinsi(provId) {
        document.getElementById('provinsiTitle').innerHTML = dataProvinces.data[provId].attributes.Provinsi;
        document.getElementById('provinsiPositif').innerHTML = dataProvinces.data[provId].attributes.Kasus_Posi;
        document.getElementById('provinsiSembuh').innerHTML = dataProvinces.data[provId].attributes.Kasus_Semb;
        document.getElementById('provinsiMeninggal').innerHTML = dataProvinces.data[provId].attributes.Kasus_Meni;

        mymodalProvinsi.show();
    }

    function modalDunia() {
        const dataLogin = JSON.parse(localStorage.getItem('dataLogin'));

        axios.get('http://localhost/kawalcorona/public/api/data_nations', { 
            headers: {
                'Authorization' : 'Bearer ' + dataLogin.data.token
            }
        }).then(function (response) {
            let html = '';

            response.data.data.forEach(val => {
                html += '<div class="card mb-2">';
                html += '<div class="card-header text-center">' + val.attributes.Country_Region + '</div>';

                html += '<div class="card-body row p-3 pb-0">';
                html += '<div class="col-md-6">';
                html += '<div class="alert alert-dark text-center p-1">';
                html += '<h3 class="m-0">' + val.attributes.Confirmed + '</h3>';
                html += '<h6 class="m-0">Positif (' + val.attributes.ConfirmedPercent + '%)</h6>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-6">';
                html += '<div class="alert alert-dark text-center p-1">';
                html += '<h3 class="m-0">' + val.attributes.Recovered + '</h3>';
                html += '<h6 class="m-0">Sembuh (' + val.attributes.RecoveredPercent + '%)</h6>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-6">';
                html += '<div class="alert alert-dark text-center p-1">';
                html += '<h3 class="m-0">' + val.attributes.Deaths + '</h3>';
                html += '<h6 class="m-0">Meninggal (' + val.attributes.DeathsPercent + '%)</h6>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-6">';
                html += '<div class="alert alert-dark text-center p-1">';
                html += '<h3 class="m-0">' + val.attributes.Active + '</h3>';
                html += '<h6 class="m-0">Dirawat (' + val.attributes.ActivePercent + '%)</h6>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
            });

            document.getElementById('rowNations').innerHTML = html;

            mymodalDunia.show();
        })
        .catch(function (error) {
            let icon = '';

            if (error.response.data.code == 422) {
                icon = 'warning';
            } else {
                icon = 'error';
            }

            Swal.fire({
                icon: icon,
                title: 'Oops...',
                text: error.response.data.message,
                allowOutsideClick: false,
            });

            axios.get('http://localhost/kawalcorona/public/api/data_nations_empty', { 
                headers: {
                    'Authorization' : 'Bearer ' + dataLogin.data.token
                }
            }).then(function (response) {
                let html = '';

                response.data.data.forEach(val => {
                    html += '<div class="card mb-2">';
                    html += '<div class="card-header text-center">' + val.attributes.Country_Region + '</div>';

                    html += '<div class="card-body row p-3 pb-0">';
                    html += '<div class="col-md-6">';
                    html += '<div class="alert alert-dark text-center p-1">';
                    html += '<h3 class="m-0">' + val.attributes.Confirmed + '</h3>';
                    html += '<h6 class="m-0">Positif</h6>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="col-md-6">';
                    html += '<div class="alert alert-dark text-center p-1">';
                    html += '<h3 class="m-0">' + val.attributes.Recovered + '</h3>';
                    html += '<h6 class="m-0">Sembuh</h6>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="col-md-6">';
                    html += '<div class="alert alert-dark text-center p-1">';
                    html += '<h3 class="m-0">' + val.attributes.Deaths + '</h3>';
                    html += '<h6 class="m-0">Meninggal</h6>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="col-md-6">';
                    html += '<div class="alert alert-dark text-center p-1">';
                    html += '<h3 class="m-0">' + val.attributes.Active + '</h3>';
                    html += '<h6 class="m-0">Dirawat</h6>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                });

                document.getElementById('rowNations').innerHTML = html;

                mymodalDunia.show();
            })
            .catch(function (error) {
                let icon = '';

                if (error.response.data.code == 422) {
                    icon = 'warning';
                } else {
                    icon = 'error';
                }

                Swal.fire({
                    icon: icon,
                    title: 'Oops...',
                    text: error.response.data.message,
                    allowOutsideClick: false,
                });
            });
        });
    }

    function modalTask(status) {
        const dataLogin = JSON.parse(localStorage.getItem('dataLogin'));

        axios.get('http://localhost/kawalcorona/public/api/all_user', { 
            headers: {
                'Authorization' : 'Bearer ' + dataLogin.data.token
            }
        }).then(function (response) {
            dataProvinces = response.data;

            let html = '';

            response.data.data.forEach(val => {
                html += '<div class="alert alert-secondary alert-dismissible mb-1" role="alert">';
                html += val.username;
                html += '<a type="button" class="btn-close" onclick="removeTask(' + "'" + val.id + "'" + ')"></a>';
                html += '</div>';
                if (val.urut != 1) {
                    html += '<a type="button" class="col-12 btn btn-sm btn-secondary mb-1" onclick="naikTask(' + "'" + val.id + "', '" + val.urut + "'" + ')">';
                    html += 'Naik';
                    html += '</a>';
                }
                if (response.data.data.length != val.urut) {
                    html += '<a type="button" class="col-12 btn btn-sm btn-secondary mb-2" onclick="turunTask(' + "'" + val.id + "', '" + val.urut + "'" + ')">';
                    html += 'Turun';
                    html += '</a>';
                }

                console.log(response.data.data.length);
                console.log(val.urut);
            });

            document.getElementById('rowUsers').innerHTML = html;

            if (status == 0) {
                mymodalTask.show();
            }
        }).catch(function (error) {
            let icon = '';

            if (error.response.data.code == 422) {
                icon = 'warning';
            } else {
                icon = 'error';
            }

            Swal.fire({
                icon: icon,
                title: 'Oops...',
                text: error.response.data.message,
                allowOutsideClick: false,
            })
        });
    }

    function addTask() {
        const dataLogin = JSON.parse(localStorage.getItem('dataLogin'));
        let taskNumber = localStorage.getItem('taskNumber');

        if (taskNumber == undefined) {
            taskNumber = 1;
        }

        axios.post('http://localhost/kawalcorona/public/api/store_user', {
            username: 'Task ' + taskNumber
        }, {
            headers: {
                'Authorization' : 'Bearer ' + dataLogin.data.token
            }
        }).then(function (response) {
            modalTask(1);

            localStorage.setItem('taskNumber', Number(taskNumber) + 1);
        }).catch(function (error) {
            let icon = '';

            if (error.response.data.code == 422) {
                icon = 'warning';
            } else {
                icon = 'error';
            }

            Swal.fire({
                icon: icon,
                title: 'Oops...',
                text: error.response.data.message,
                allowOutsideClick: false,
            });
        });
    }

    function removeTask(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            allowOutsideClick: false,
            focusConfirm: true
        }).then((result) => {
            if (result.isConfirmed) {
                const dataLogin = JSON.parse(localStorage.getItem('dataLogin'));

                axios.delete('http://localhost/kawalcorona/public/api/delete_user/' + id, {
                    headers: {
                        'Authorization' : 'Bearer ' + dataLogin.data.token
                    }
                }).then(function (response) {
                    modalTask(1);

                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        allowOutsideClick: false,
                    });
                }).catch(function (error) {
                    let icon = '';

                    if (error.response.data.code == 422) {
                        icon = 'warning';
                    } else {
                        icon = 'error';
                    }

                    Swal.fire({
                        icon: icon,
                        title: 'Oops...',
                        text: error.response.data.message,
                        allowOutsideClick: false,
                    });
                });
            }
        });
    }

    function naikTask(id, urut) {
        const dataLogin = JSON.parse(localStorage.getItem('dataLogin'));

        axios.post('http://localhost/kawalcorona/public/api/naik_user', {
            id: id,
            urut: urut
        }, {
            headers: {
                'Authorization' : 'Bearer ' + dataLogin.data.token
            }
        }).then(function (response) {
            modalTask(1);
        }).catch(function (error) {
            let icon = '';

            if (error.response.data.code == 422) {
                icon = 'warning';
            } else {
                icon = 'error';
            }

            Swal.fire({
                icon: icon,
                title: 'Oops...',
                text: error.response.data.message,
                allowOutsideClick: false,
            });
        });
    }

    function turunTask(id, urut) {
        const dataLogin = JSON.parse(localStorage.getItem('dataLogin'));

        axios.post('http://localhost/kawalcorona/public/api/turun_user', {
            id: id,
            urut: urut
        }, {
            headers: {
                'Authorization' : 'Bearer ' + dataLogin.data.token
            }
        }).then(function (response) {
            modalTask(1);
        }).catch(function (error) {
            let icon = '';

            if (error.response.data.code == 422) {
                icon = 'warning';
            } else {
                icon = 'error';
            }

            Swal.fire({
                icon: icon,
                title: 'Oops...',
                text: error.response.data.message,
                allowOutsideClick: false,
            });
        });
    }
</script>
@endsection