<?php
/**
 * Summary Text
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */


?>
<div class="col-md-12 page-404">
        <div class="number">
                 404
        </div>
        <div class="details">
                <h3>Oops! You're lost.</h3>
                <p>
                    <?= $exception->getMessage() ?>
                </p>
                <!--<form action="#">
                        <div class="input-group input-medium">
                                <input type="text" class="form-control" placeholder="keyword...">
                                <span class="input-group-btn">
                                <button type="submit" class="btn blue"><i class="fa fa-search"></i></button>
                                </span>
                        </div>
                </form>-->
        </div>
</div>