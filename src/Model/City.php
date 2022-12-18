<?php declare(strict_types=1);

namespace Caldera\LuftModel\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\ExclusionPolicy("ALL")
 */
class City
{
    /**
     * @JMS\Expose()
     */
    protected ?\DateTime $createdAt = null;

    /**
     * @JMS\Expose()
     */
    protected ?string $name = null;

    /**
     * @JMS\Expose()
     */
    protected ?string $slug = null;

    /**
     * @JMS\Expose()
     */
    protected ?string $description = null;

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): City
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): City
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): City
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description = null): City
    {
        $this->description = $description;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?: '';
    }
}
