#!/usr/bin/env python3
import sys
from pypdf import PdfReader

if len(sys.argv) != 2:
    print("Usage: info.py input.pdf")
    sys.exit(1)

reader = PdfReader(sys.argv[1])
meta = reader.metadata or {}

# základné údaje
info = {
    "pages": len(reader.pages),
    "title": meta.title or "",
    "author": meta.author or "",
    "creator": meta.creator or "",
    "producer": meta.producer or "",
    "subject": meta.subject or "",
}

print(info)
