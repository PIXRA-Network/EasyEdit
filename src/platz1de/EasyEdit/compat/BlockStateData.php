<?php

/**
 * Compatibility stub for NetherGamesMC/PocketMine-MP
 * BlockStateData was removed from NetherGamesMC fork
 * This stub provides basic compatibility for EasyEdit
 */

declare(strict_types=1);

namespace pocketmine\data\bedrock\block;

class BlockStateData {
	/** @var int Current block state version for NetherGamesMC (estimated) */
	public const CURRENT_VERSION = 18090800; // Approximate version for 1.21.x

	private string $name;
	/** @var array<string, mixed> */
	private array $states;
	private int $version;

	/**
	 * @param string $name
	 * @param array<string, mixed> $states
	 * @param int $version
	 */
	public function __construct(string $name, array $states, int $version) {
		$this->name = $name;
		$this->states = $states;
		$this->version = $version;
	}

	/**
	 * @param string $name
	 * @param array<string, mixed> $states
	 * @return self
	 */
	public static function current(string $name, array $states): self {
		return new self($name, $states, self::CURRENT_VERSION);
	}

	public function getName(): string {
		return $this->name;
	}

	/**
	 * @return array<string, mixed>
	 */
	public function getStates(): array {
		return $this->states;
	}

	public function getVersion(): int {
		return $this->version;
	}

	public function getVersionAsString(): string {
		// Convert version to string format like "1.21.0.3"
		$major = (int)($this->version / 1000000);
		$minor = (int)(($this->version % 1000000) / 10000);
		$patch = (int)(($this->version % 10000) / 100);
		$revision = $this->version % 100;

		return "{$major}.{$minor}.{$patch}.{$revision}";
	}
}
