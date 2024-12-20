<?php
function generateForm($tableName, $db): void
{
    $query = "DESCRIBE $tableName";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>";
        echo "<div class='container mt-5'>";
        echo "<form method='POST' action='' class='row g-3'>";

        while ($column = $result->fetch_assoc()) {
            $field = $column['Field'];
            $type = $column['Type'];
            $nullable = $column['Null'];

            $inputType = match (true) {
                str_contains($type, 'int') => 'number',
                str_contains($type, 'date') => 'date',
                str_contains($type, 'enum') => 'select',
                default => 'text',
            };

            if ($inputType === 'select') {
                preg_match_all("/'(.*?)'/", $type, $matches);
                $enumValues = $matches[1];
            }

            echo "<div class='col-md-6'>";
            echo "<label for='$field' class='form-label'>" . ucfirst(str_replace('_', ' ', $field)) . ":</label>";

            if ($inputType === 'select') {
                echo "<select name='$field' id='$field' class='form-select'>";
                foreach ($enumValues as $value) {
                    echo "<option value='$value'>$value</option>";
                }
                echo "</select>";
            } else {
                $required = ($nullable === 'NO') ? 'required' : '';
                echo "<input type='$inputType' name='$field' id='$field' class='form-control' $required>";
            }

            echo "</div>";
        }

        echo "<div class='col-12'>";
        echo "<button type='submit' class='btn btn-primary'>Submit</button>";
        echo "</div>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "No columns found in the table.";
    }
}