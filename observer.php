<?php

class ObserverA implements SplObserver
{
    public function update(SplSubject $subject)
    {
        echo "A";
    }
}

class ObserverB implements SplObserver
{
    public function update(SplSubject $subject)
    {
        echo "B";
    }
}

class MySubject implements SplSubject
{
    protected $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

$observerA = new ObserverA();
$observerB = new ObserverB();

$subject = new MySubject();

$subject->attach($observerA);
$subject->attach($observerB);
$subject->notify();

$subject->detach($observerB);
$subject->notify();