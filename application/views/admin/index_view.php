<!DOCTYPE html>
<html>
<?php $this->load->view("layout/header.php")?>
   
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>    
    
<body>
 <?php $this->load->view("layout/bar.php")?>
    <div id="wrapper">
    <?php $this->load->view("layout/wrapper.php")?>
    <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="page-head-line">Selamat Datang</h3>
                        <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Statistik</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div id="chart1" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="chart2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="chart3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="chart4" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="chart5" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="chart6" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="chart7" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="chart8" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="chart9" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="chart10" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        
                    </div>
                </div>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row"></div>
                <div class="row"></div>
				<div class="row"></div>
                <!--/.Row-->
               
            </div>
    
            <!-- /. PAGE INNER  -->
    </div>
    </div>
<?php $this->load->view("layout/footer.php")?>
</body>
</html>

<script type="text/javascript">

Highcharts.chart('chart1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini.'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Tidak Mudah',
            y: <?php echo $s1a[0]->jumlah;?>
        }, {
            name: 'Kurang Mudah',
            y: <?php echo $s1b[0]->jumlah;?>
        }, {
            name: 'Mudah',
            y: <?php echo $s1c[0]->jumlah;?>
        }, {
            name: 'Sangat Mudah',
            y: <?php echo $s1d[0]->jumlah;?>
        }]
    }]
});
		</script>

<script type="text/javascript">

Highcharts.chart('chart2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelanggan dengan jenis pelayanannya'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Tidak Sesuai',
            y: <?php echo $s2a[0]->jumlah;?>
        }, {
            name: 'Kurang Sesuai',
            y: <?php echo $s2b[0]->jumlah;?>
        }, {
            name: 'Sesuai',
            y: <?php echo $s2c[0]->jumlah;?>
        }, {
            name: 'Sangat Sesuai',
            y: <?php echo $s2d[0]->jumlah;?>
        }]
    }]
});
		</script>


<script type="text/javascript">

Highcharts.chart('chart3', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Bagaimana pendapat Saudara tentang kejelasan dan kepastian petugas melayani'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Tidak Jelas',
            y: <?php echo $s3a[0]->jumlah;?>
        }, {
            name: 'Kurang Jelas',
            y: <?php echo $s3b[0]->jumlah;?>
        }, {
            name: 'Jelas',
            y: <?php echo $s3c[0]->jumlah;?>
        }, {
            name: 'Sangat Jelas',
            y: <?php echo $s3d[0]->jumlah;?>
        }]
    }]
});
		</script>

<script type="text/javascript">

Highcharts.chart('chart4', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Bagaimana pendapat Saudara tentang kemampuan petugas dalam memberikan pelayanan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Tidak Mampu',
            y: <?php echo $s4a[0]->jumlah;?>
        }, {
            name: 'Kurang Mampu',
            y: <?php echo $s4b[0]->jumlah;?>
        }, {
            name: 'Mampu',
            y: <?php echo $s4c[0]->jumlah;?>
        }, {
            name: 'Sangat Mampu',
            y: <?php echo $s4d[0]->jumlah;?>
        }]
    }]
});
		</script>

<script type="text/javascript">

Highcharts.chart('chart5', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Bagaimana pendapat Saudara tentang kecepatan pelayanan di unit ini'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Tidak Cepat',
            y: <?php echo $s5a[0]->jumlah;?>
        }, {
            name: 'Kurang Cepat',
            y: <?php echo $s5b[0]->jumlah;?>
        }, {
            name: 'Cepat',
            y: <?php echo $s5c[0]->jumlah;?>
        }, {
            name: 'Sangat Cepat',
            y: <?php echo $s5d[0]->jumlah;?>
        }]
    }]
});
		</script>

<script type="text/javascript">

Highcharts.chart('chart6', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Bagaimana pendapat Saudara tentang kesopanan dan keramahan petugas dalam memberikan pelayanan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Tidak Sopan dan ramah',
            y: <?php echo $s6a[0]->jumlah;?>
        }, {
            name: 'Kurang Sopan dan ramah',
            y: <?php echo $s6b[0]->jumlah;?>
        }, {
            name: 'Sopan dan ramah',
            y: <?php echo $s6c[0]->jumlah;?>
        }, {
            name: 'Sangat Sopan dan ramah',
            y: <?php echo $s6d[0]->jumlah;?>
        }]
    }]
});
		</script>

<script type="text/javascript">

Highcharts.chart('chart7', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Bagaimana pendapat Saudara tentang kewajaran biaya untuk mendapatkan pelayanan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Tidak wajar',
            y: <?php echo $s7a[0]->jumlah;?>
        }, {
            name: 'Kurang wajarh',
            y: <?php echo $s7b[0]->jumlah;?>
        }, {
            name: 'wajar',
            y: <?php echo $s7c[0]->jumlah;?>
        }, {
            name: 'Sangat wajar',
            y: <?php echo $s7d[0]->jumlah;?>
        }]
    }]
});
		</script>

<script type="text/javascript">

Highcharts.chart('chart8', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Bagaimana pendapat Saudara tentang kesesuaian antara biaya yang dibayarkan dengan biaya yang telah ditetapkan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Selalu tidak sesuai',
            y: <?php echo $s8a[0]->jumlah;?>
        }, {
            name: 'Kadang - kadang sesuai',
            y: <?php echo $s8b[0]->jumlah;?>
        }, {
            name: 'Banyak sesuainya',
            y: <?php echo $s8c[0]->jumlah;?>
        }, {
            name: 'Selalu sesuai',
            y: <?php echo $s8d[0]->jumlah;?>
        }]
    }]
});
		</script>

<script type="text/javascript">

Highcharts.chart('chart9', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Bagaimana pendapat Saudara tentang ketetapan pelaksanaan terhadap jadwal waktu pelayanan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Selalu tidak tepat',
            y: <?php echo $s9a[0]->jumlah;?>
        }, {
            name: 'Kadang - kadang tepat ',
            y: <?php echo $s9b[0]->jumlah;?>
        }, {
            name: 'Banyak tepatnya',
            y: <?php echo $s9c[0]->jumlah;?>
        }, {
            name: 'Selalu tepat',
            y: <?php echo $s9d[0]->jumlah;?>
        }]
    }]
});
		</script>

<script type="text/javascript">

Highcharts.chart('chart10', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Bagaimana pendapat Saudara tentang kenyamanan dilingkungan unit pelayanan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Tidak nyaman',
            y: <?php echo $s10a[0]->jumlah;?>
        }, {
            name: 'Kurang nyaman',
            y: <?php echo $s10b[0]->jumlah;?>
        }, {
            name: 'Nyaman',
            y: <?php echo $s10c[0]->jumlah;?>
        }, {
            name: 'Sangat nyaman',
            y: <?php echo $s10d[0]->jumlah;?>
        }]
    }]
});
		</script>
