<?php

interface Device
{
  public function isEnabled(): bool;
  public function enable(): void;
  public function disable(): void;
  public function getVolume(): int;
  public function setVolume($percent): void;
  public function getChannel(): int;
  public function setChannel($channel): void;
  public function printStatus(): void;
}

class Radio implements Device
{
  private $on = false;
  private $volume = 30;
  private $channel = 1;

  public function enable(): void
  {
    $this->on = true;
  }

  public function disable(): void
  {
    $this->on = false;
  }

  public function getVolume(): int
  {
    return $this->volume;
  }

  public function setVolume($volume): void
  {
    if ($this->volume > 100) {
      $this->volume = 100;
    } else if ($this->volume < 0) {
      $this->volume = 0;
    } else {
      $this->volume = $volume;
    }
  }

  public function getChannel(): int
  {
    return $this->channel;
  }

  public function setChannel($channel): void
  {
    $this->channel = $channel;
  }

  public function isEnabled(): bool
  {
    return $this->on;
  }

  public function printStatus(): void
  {
    printf("-----------------------------------\n");
    printf("| I'm radio.");
    printf("\n");
    printf("| I'm " . ($this->on ? "enabled" : "disabled"));
    printf("\n");
    printf("| Current volumne is " . $this->volume );
    printf("\n");
    printf("| Current channel is " . $this->channel);
    printf("\n");
    printf("------------------------------------\n");
    printf("\n");
  }
}

class TV implements Device
{
  private $on = false;
  private $volume = 30;
  private $channel = 1;

  public function enable(): void
  {
    $this->on = true;
  }

  public function disable(): void
  {
    $this->on = false;
  }

  public function getVolume(): int
  {
    return $this->volume;
  }

  public function setVolume($volume): void
  {
    if ($this->volume > 100) {
      $this->volume = 100;
    } else if ($this->volume < 0) {
      $this->volume = 0;
    } else {
      $this->volume = $volume;
    }
  }

  public function getChannel(): int
  {
    return $this->channel;
  }

  public function setChannel($channel): void
  {
    $this->channel = $channel;
  }

  public function isEnabled(): bool
  {
    return $this->on;
  }

  public function printStatus(): void
  {
    printf("-----------------------------------\n");
    printf("| I'm TV set.");
    printf("\n");
    printf("| I'm " .($this->on ? "enabled" : "disabled"));
    printf("\n");
    printf("| Current volumne is " . $this->volume);
    printf("\n");
    printf("| Current channel is " . $this->channel);
    printf("\n");
    printf("------------------------------------\n");
  }
}

interface Remote
{
  public function power(): void;
  public function volumeDown(): void;
  public function volumeUp(): void;
  public function channelDown(): void;
  public function channelUp(): void;
  public function getDevice(): Device;
}

class BasicRemote implements Remote
{
  protected $device;

  public function __construct(Device $device)
  {
    $this->device = $device;
  }

  public function power(): void
  {
    printf("Remote: power toggle");
    if ($this->device->isEnabled()) {
      $this->device->disable();
    } else {
      $this->device->enable();
    }
  }

  public function volumeDown(): void
  {
    printf("Remote: volume down");
    $this->device->setVolume($this->device->getVolume() - 10);
  }

  public function volumeUp(): void
  {
    printf("Remote: volume up");
    $this->device->setVolume($this->device->getVolume() + 10);
  }

  public function channelDown(): void
  {
    printf("Remote: channel down");
    $this->device->setChannel($this->device->getChannel() - 1);
  }

  public function channelUp(): void
  {
    printf("Remote: channel up");
    $this->device->setChannel($this->device->getChannel() + 1);
  }

  public function getDevice(): Device
  {
    return $this->device;
  }
}

class AdvancedRemote extends BasicRemote
{
  public function __construct(Device $device)
  {
    $this->device = $device;
  }

  public function mute()
  {
    printf("Remote: mute");
    $this->device->setVolume(0);
  }
}


function testDevice(Remote $remote)
{
  printf("Test Remote!");
  printf("\n");
  $remote->power();
  $remote->getDevice()->printStatus();
}

$tv = new TV();
$radio = new Radio();
testDevice(new BasicRemote($tv));