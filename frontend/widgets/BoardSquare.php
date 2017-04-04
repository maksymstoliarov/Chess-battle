<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 26.03.17
 * Time: 12:57
 */

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class BoardSquare extends Widget
{
    public static function widget($color, $board, $figures, $whiteUser, $blackUser, $game_id) {

        echo Html::beginTag('td', [
            'height' => 50,
            'width' => 50,
            'bgcolor' => $color,
            'align' => 'center',
            'valign' => 'center'
        ]);
        foreach ($figures as $figure) {

            if ($board->x == $figure->currentPositionX && $board->y == $figure->currentPositionY) {
                if ($figure->status != 'killed') {
                    echo Html::img($figure->image, [
                        'id' => 'figure'.$figure->id,
                        'onclick' => "light(".$figure->name.', '.$figure->id.")"
                    ]);
                }
            }

            Buttons::widget($figure, $board, $whiteUser, $blackUser, $game_id);
            /*if ($figure->name == 'pawn') {
                FirstMoveButton::widget($figure, $board, $whiteUser, $blackUser);
            }*/
            /*if ($figure->name == 'king') {
                CastlingButton::widget($figure, $board, $whiteUser, $blackUser);
            }*/
        }
        echo Html::endTag('td');
    }
}