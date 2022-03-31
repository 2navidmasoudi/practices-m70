        <table class="<?php echo $this->tableClasses ?>">
            <tr class="<?php echo $this->headerClasses ?>">
                <?php foreach ($this->header as $title) { ?>
                    <td><?php echo $title ?></td>
                <?php } ?>
            </tr>
            <?php foreach ($this->rows as $row) { ?>
                <tr>
                    <?php foreach ($row as $cell) { ?>
                        <td class="<?php echo $this->rowscellClasses ?>">
                            <?php echo $cell ?>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>