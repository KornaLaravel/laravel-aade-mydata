<?php

namespace Firebed\AadeMyData\Models;

use Firebed\AadeMyData\Enums\FeesPercentCategory;
use Firebed\AadeMyData\Enums\OtherTaxesPercentCategory;
use Firebed\AadeMyData\Enums\StampCategory;
use Firebed\AadeMyData\Enums\TaxType;
use Firebed\AadeMyData\Enums\WithheldPercentCategory;
use Firebed\AadeMyData\Traits\HasFactory;

/**
 * Περιγράφει τη δομή των φόρων που αφορούν το σύνολο του παραστατικού.
 */
class TaxTotals extends Type
{
    use HasFactory;
    
    protected array $expectedOrder = [
        'taxType',
        'taxCategory',
        'underlyingValue',
        'taxAmount',
        'id',
    ];
    
    /**
     * @return string|null Είδος Φόρου
     */
    public function getTaxType(): ?string
    {
        return $this->get('taxType');
    }

    /**
     * @param TaxType|string $taxType Είδος Φόρου
     */
    public function setTaxType(TaxType|string $taxType): void
    {
        $this->set('taxType', $taxType);
    }

    /**
     * @return int|null Κατηγορία Φόρου
     */
    public function getTaxCategory(): ?int
    {
        return $this->get('taxCategory');
    }

    /**
     * Το πεδίο αυτό μπορεί να πάρει κάθε φορά οποιαδήποτε τιμή
     * από τον αντίστοιχο πίνακα του Παραρτήματος του φόρου που
     * αναφέρεται στο πεδίο taxType.
     *
     * @param WithheldPercentCategory|FeesPercentCategory|OtherTaxesPercentCategory|StampCategory|int $taxCategory Κατηγορία Φόρου
     */
    public function setTaxCategory(WithheldPercentCategory|FeesPercentCategory|OtherTaxesPercentCategory|StampCategory|int $taxCategory): void
    {
        $this->set('taxCategory', $taxCategory);
    }

    /**
     * @return float|null Υποκείμενη Αξία
     */
    public function getUnderlyingValue(): ?float
    {
        return $this->get('underlyingValue');
    }

    /**
     * <ul>Υποδηλώνει την αξία στην οποία εφαρμόζεται ο συγκεκριμένος φόρος.
     * <li>Ελάχιστη τιμή = 0</li>
     * <li>Δεκαδικά ψηφία = 2</li>
     * </ul>
     *
     * @param float $underlyingValue Υποκείμενη Αξία
     */
    public function setUnderlyingValue(float $underlyingValue): void
    {
        $this->set('underlyingValue', $underlyingValue);
    }

    /**
     * @return float|null Ποσό Φόρου
     */
    public function getTaxAmount(): ?float
    {
        return $this->get('taxAmount');
    }

    /**
     * <ul>
     * <li>Ελάχιστη τιμή = 0</li>
     * <li>Δεκαδικά ψηφία = 2</li>
     * </ul>
     *
     * @param float $taxAmount Ποσό Φόρου
     */
    public function setTaxAmount(float $taxAmount): void
    {
        $this->set('taxAmount', $taxAmount);
    }

    /**
     * @return int|null Αύξων αριθμός γραμμής
     */
    public function getId(): ?int
    {
        return $this->get('id');
    }

    /**
     * @param int $id Αύξων αριθμός γραμμής
     */
    public function setId(int $id): void
    {
        $this->set('id', $id);
    }

}