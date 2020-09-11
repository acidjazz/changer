<?php


namespace App\Services;


class ChangeService
{
    private int $price;

    /**
     * Our register drawer
     *
     * @var array|int[] drawer
     */
    private array $drawer = [
        '100' => 10000,
        '50' => 5000,
        '20' => 2000,
        '10' => 1000,
        '5' => 500,
        '1' => 100,
        '.25' => 25,
        '.10' => 10,
        '.5' => 5,
        '.1' => 1,
    ];

    /**
     * Change returned to customer
     *
     * @var array $change
     */
    private array $change;

    /**
     * ChangeService constructor.
     * @param int $price
     */
    public function __construct(int $price)
    {
        $this->price = $price;
    }

    /**
     * Calculate and return change based on drawer
     *
     * @param int $wallet
     * @return array
     */
    public function change(int $wallet)
    {
        $diff = $wallet - $this->price;
        foreach ($this->drawer as $bill=>$value) {
            while (true) {
                if ($value <= $diff) {
                    if (!isset($this->change[$bill])) {
                        $this->change[$bill] = 1;
                    } else {
                        $this->change[$bill]++;
                    }
                    $diff -= $value;
                } else {
                    break;
                }
            }
        }
        krsort($this->change, SORT_NUMERIC);
        return $this->change;
    }
}
