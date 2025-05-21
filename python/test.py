# test_libs.py
import sys

print("Python version:", sys.version)

# Test PyPDF
try:
    from pypdf import PdfReader, PdfWriter
    print("pypdf: OK")
except ImportError as e:
    print("pypdf: FAIL -", e)

# Test ReportLab
try:
    from reportlab.lib.pagesizes import A4
    from reportlab.pdfgen import canvas
    print("reportlab: OK")
except ImportError as e:
    print("reportlab: FAIL -", e)

# Test Pillow
try:
    from PIL import Image
    print("Pillow: OK")
except ImportError as e:
    print("Pillow: FAIL -", e)

# Test pdf2image
try:
    from pdf2image import convert_from_path
    print("pdf2image: OK")
except ImportError as e:
    print("pdf2image: FAIL -", e)

# Test docx2pdf
try:
    from docx2pdf import convert
    print("docx2pdf: OK")
except ImportError as e:
    print("docx2pdf: FAIL -", e)

# Test pdf2docx
try:
    from pdf2docx import Converter
    print("pdf2docx: OK")
except ImportError as e:
    print("pdf2docx: FAIL -", e)

# Test BytesIO (should always work)
try:
    from io import BytesIO
    print("BytesIO: OK")
except ImportError as e:
    print("BytesIO: FAIL -", e)