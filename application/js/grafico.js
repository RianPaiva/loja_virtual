$('document').ready(function () {
    drawBasic();
    drawBasic2();
}

);

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);
google.charts.setOnLoadCallback(drawBasic2);

function drawBasic() {

    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Produto');
    data.addColumn('number', 'Vendas');

    data.addRows([
        ['Tênis', 15],
        ['Bonés', 6],
        ['Camisas', 3],
    ]);

    var options = {
        title: 'Categorias Mais Vendidas',
        hAxis: {
            title: 'Produtos',
            viewWindow: {
                min: [7, 30, 0],
                max: [17, 30, 0]
            }
        },
        vAxis: {
            title: 'Quantidade'
        }
    };

    var chart = new google.visualization.ColumnChart(
        document.getElementById('div_vendas'));

    chart.draw(data, options);
}

function drawBasic2() {

    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Produto');
    data.addColumn('number', 'Vendas');

    data.addRows([
        ['Air Max', 15],
        ['Air Force', 6],
        ['Dunk Low', 3],
    ]);

    var options = {
        title: 'Produtos Mais Vendidos',
        hAxis: {
            title: 'Produtos',
            viewWindow: {
                min: [7, 30, 0],
                max: [17, 30, 0]
            }
        },
        vAxis: {
            title: 'Quantidade'
        }
    };

    var chart = new google.visualization.ColumnChart(
        document.getElementById('div_vendas_mes'));

    chart.draw(data, options);
}