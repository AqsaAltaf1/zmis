<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zakat API Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center; /* Center align all content */
        }
        .tabs {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .tab-button {
            padding: 10px 20px;
            margin: 0 5px;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f1f1f1;
        }
        .tab-button.active {
            background-color: #ddd;
        }
        .tab-content {
            display: none;
            margin-top: 20px;
        }
        .tab-content.active {
            display: block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        canvas {
            width: 700px !important; /* Set canvas width */
            height: 250px !important; /* Set canvas height */
            border: 1px solid #ddd; /* Optional: Add a border for better visibility */
            margin: 0 auto; /* Center align the canvas */
        }
    </style>
</head>
<body>
   
    
<div id="content">
  <!-- Content gets loaded here based on the tab selection -->
</div>


    <!-- Tabs -->
    <div class="tabs">
        <!-- <div class="tab-button active" data-tab="tab1">Mustahiqeen Summary</div>
        <div class="tab-button" data-tab="tab2">GA Mustahiqeen List</div>
        <div class="tab-button" data-tab="tab3">MA Mustahiqeen List</div>
        <div class="tab-button" data-tab="tab4">DM Mustahiqeen List</div>
        <div class="tab-button" data-tab="tab5">ES Mustahiqeen List</div>
        <div class="tab-button" data-tab="tab6">HC Mustahiqeen List</div> -->
    </div>

    <!-- Tab Contents -->
    <div id="tabs" class="tab-content active">
        <h2>Mustahiqeen Summary</h2>
        <?php if (isset($data) && !empty($data)): ?>
        <table>
            <thead>
                <tr>
                    <th>Mustahiq Type</th>
                    <th>Total Registered</th>
                    <th>Total Paid</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['MustahiqType']); ?></td>
                        <td><?php echo htmlspecialchars($item['TotalRegistered']); ?></td>
                        <td><?php echo htmlspecialchars($item['TotalPaid']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No data available.</p>
    <?php endif; ?>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const tabs = document.querySelectorAll('.tab-button');
  tabs.forEach(tab => {
    tab.addEventListener('click', function () {
      const type = this.getAttribute('data-type');
      const url = http:/localhost/zmis/ZakatApi?token=zakat_CM_data&type=${type};
      
      // Fetch data from the server
      fetch(url)
        .then(response => response.json())
        .then(data => {
          document.getElementById('content').innerHTML = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
        })
        .catch(error => console.error('Error:', error));
    });
  });
});

</script>

</body>
</html>

<!-- ------model code for Mustahiqeen Summary------ -->

<!-- <?php 
// class Api_model extends CI_Model {

//     public function __construct() {
//         parent::__construct();
//         $this->load->database();
//     }

//     public function MustahiqeenSummary($financial_year) {
//         // Example query for fetching Mustahiqeen Summary
//         $query = $this->db->select('MustahiqType, TotalRegistered, TotalPaid')
//                           ->from('mustahiqeensummary')
//                           // ->where('financial_year', $financial_year)
//                           ->get();
//         return $query->result_array();
//     }
// }  -->


